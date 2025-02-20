<style>
    input:read-only {
        background-color: #D3D3D3;
        outline: none;
        cursor: pointer;
    }
    </style>
<?php 

include "header.php";

?>

<?php 



include "db_conn.php";
$id = $_GET['id'];
$fetchAllData = mysqli_query($conn,"SELECT * FROM form WHERE id = $id");
$customer = mysqli_fetch_assoc( $fetchAllData);
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<div id="content-wrapper">
    <div id="content">
        <div id="app">
        <?php
            include "top_nav.php";
        ?>

        <div class="container-fluid">
            <div class="user-info" style="background: white; padding: 10px;">
                <p><span>Name: </span><?php  echo $customer['name'] ?></p>
                <p><span>Address: </span><?php  echo $customer["adress"] ?></p>
                <p><span>Phone: </span><?php echo $customer['mobile'] ?></p>
                <a href="generate_invoice.php?id=<?php echo $customer["id"] ?>" class="bg-primary" style="padding: 5px 10px 5px 10px; color: white; margin-bottom: 30px;">Generate Invoice</a>
                <a href="generate_receipt.php?id=<?php echo $customer["id"] ?>" class="bg-primary" style="padding: 5px 10px 5px 10px; color: white; margin-bottom: 30px; margin-left: 10px;">Generate Receipt</a>
                <a href="offer.php?id=<?php echo $customer["id"] ?>" class="ml-2 bg-warning" style="padding: 5px 10px 5px 10px; color: white; margin-bottom: 30px;">Offer</a>
            </div>
        </div>
        <div class="amounts container-fluid" style="margin-top: 30px;">
            <div class="details" style="margin-bottom: 10px;">
                <label for="issue_date" style="width: 33.33%;">
                    <p style="margin-bottom: 0px;">Issue Date</p>
                    <input type="date" id="issue_date" v-model="issue_date" name="issue_date" style="width: 98%;"/>
                </label>
                <label for="expiry_date" style="width: 33.33%;">
                    <p style="margin-bottom: 0px;">Expiry Date</p>
                    <input type="date" id="expiry_date" v-model="expiry_date" name="expiry_date" style="width: 98%;"/>
                </label>
                <label for="expiry_date" style="width: 50%;">
                    <p style="margin-bottom: 0px;">Paid</p>
                    <input type="text" id="paid" :value="paid" @input="paid = Number($event.target.value.replace(/,+/g, '')).toLocaleString('en-US')" name="paid" style="width: 99%;"/>
                </label>
                <label for="expiry_date" style="width: 50%;">
                    <p style="margin-bottom: 0px;">Balance</p>
                    <input type="text" id="balance" :value="balance.toLocaleString('en-US')" @input="balance = Number($event.target.value.replace(/,+/g, '')).toLocaleString('en-US')" name="balance" style="width: 99%;" readonly/>
                </label>
            </div>
            <p style="margin-bottom: 0px;">Amounts</p>
            <div class="amount" v-for="(payment, index) in payments">
                <div class="description" style="width: 100%; display: flex; align-items: start;">
                    <input type="text" style="width: 60%; margin-right: 10px;" v-model="payment.description" placeholder="Description" />
                    <input type="date" style="width: 10%; margin-right: 10px;" v-model="payment.date" placeholder="Due Date" />
                    <input type="text" style="width: 10%; margin-right: 10px;" :value="payment.price" @input="payment.price = Number($event.target.value.replace(/,+/g, '')).toLocaleString('en-US')" placeholder="Price" />
                    <label :for="`cp-${payment.id}`" style="font-size: 10px;">
                        <span>Current Payable</span> <br>
                        <input :id="`cp-${payment.id}`" type="checkbox" v-model="payment.cp" />
                    </label>
                    <button v-if="(payments.length - 1) == index" class="bg-primary text-white" style="margin-left: 10px; border: none;" @click="addNew"> 
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <button @click="remove(payment.id)" v-else class="bg-danger text-white" style="margin-left: 10px; border: none;">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-top: 30px; display: flex; justify-content: space-between;">
            <div style="display: flex; justify-content: end; flex-direction: column; align-items: end; width: 50%; order: 2;">
                <p style="margin: 0px;">Payable Amount: <span v-text="payments.reduce((sum, item) => sum + parseInt(item.price), 0).toLocaleString('en-US')"></span>/-</p>
                <p>Current Payable Amount: <span v-text="payments.reduce((sum, item) =>  item.cp ? sum + parseInt(item.price) : sum, 0).toLocaleString('en-US')"></span>/-</p>
            </div>
            <div style="width: 50%;">
                <button class="btn-primary" style="border: none; padding: 5px 10px 5px 10px;" @click="save">Save</button>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <?php 

        $id = $_GET['id'];
        $fetchAllData = mysqli_query($conn,"SELECT * FROM invoices WHERE form_id = $id");
        $invoice = mysqli_fetch_assoc( $fetchAllData);
      
    ?>
    <script>
         const app = Vue.createApp({
            data() {
                return {
                    issue_date: "<?php echo $invoice["issue_date"] ?? null; ?>",
                    expiry_date: "<?php echo $invoice["expiry_date"] ?? null; ?>",
                    cef: "<?php echo $customer['unique_key'] ?>",
                    payments: JSON.parse(<?php echo json_encode($invoice['invoice_data'] ?? '[]'); ?>),
                    paid: "<?php echo $invoice["paid"] ?? null ?>",
                    balance: 0,
                };
            },
            mounted() {
                if(!this.payments.length) {
                    this.payments.push({
                        id: 1,
                        description: "",
                        date: "",
                        price: 0,
                        cp: false
                    })
                }
                const total = this.payments?.reduce((sum, item) =>  sum + item.price, 0) ?? 0
                this.balance = (total) ? total - this.paid : 0

                this.paid = this.paid.toLocaleString('en-US');
                this.balance = this.balance.toLocaleString('en-US');
            },
            watch: {
                paid() {
                    const total = this.payments?.reduce((sum, item) =>  sum + parseInt(item.price), 0) ?? 0
                    this.balance = (total) ? total - Number(this.paid.replace(/,/g, "")) : 0
                },
                payments: {
                    handler() {
                        const total = this.payments?.reduce((sum, item) =>  sum + parseInt(item.price), 0) ?? 0
                        this.balance = (total) ? total - this.paid : 0
                    },
                    deep: true
                }
            },
            methods: {
                updatePaid(value) {
                    const rawValue = value.replace(/,/g, ""); // Remove all commas
                    if (!isNaN(rawValue) && rawValue !== "") {
                        paid.value = rawValue; // Store numeric value without commas
                    }
                },
                addNew() {
                    this.payments.push({
                        id: this.payments.length + 1,
                        description: "",
                        date: "",
                        price: 0,
                        cp: false
                    })
                },
                remove(id) {
                    this.payments = this.payments.filter(payment => payment.id != id);
                    let i = 1;
                    this.payments.forEach(payment => {
                        payment.id = i;
                        i++;
                    });
                },
                async save() {
                    const response = await axios.get("save_invoice.php", {
                        params: {
                            form_id: '<?php echo $_GET['id'] ?>',
                            invoice_data: JSON.stringify(this.payments),
                            cef: this.cef,
                            issue_date: this.issue_date,
                            expiry_date: this.expiry_date,
                            paid: this.paid > 0 ? this.paid : 0,
                            balance: this.balance > 0 ? this.balance : 0
                        }
                    }) 
                    if(response.data === 1) {
                        alert("Succesfully updated!");
                    } else {
                        alert("Please fill all fields");
                    }
                }
            }
        });

        app.mount("#app");
    </script>
</div>