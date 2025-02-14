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
            </div>
        </div>
        <div class="amounts container-fluid" style="margin-top: 30px;">
            <label for="cef">
                <p>cef</p>
                <input type="text" id="cef" />
            </label>
            <div class="amount" v-for="(payment, index) in payments">
                <div class="description" style="width: 100%; display: flex; align-items: start;">
                    <input type="text" style="width: 60%; margin-right: 10px;" v-model="payment.description" placeholder="Description" />
                    <input type="date" style="width: 10%; margin-right: 10px;" v-model="payment.date" placeholder="Due Date" />
                    <input type="number" style="width: 10%; margin-right: 10px;" v-model="payment.price" placeholder="Price" />
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
                <p style="margin: 0px;">Payable Amount: <span v-text="payments.reduce((sum, item) => sum + item.price, 0)"></span>/-</p>
                <p>Current Payable Amount: <span v-text="payments.reduce((sum, item) =>  item.cp ? sum + item.price : sum, 0)"></span>/-</p>
            </div>
            <div style="width: 50%;">
                <button class="btn-primary" style="border: none; padding: 5px 10px 5px 10px;" @click="save">Update</button>
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
                    payments: JSON.parse('<?php echo $invoice['invoice_data'] ?>'),
                };
            },
            methods: {
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
                            invoice_data: JSON.stringify(this.payments)
                        }
                    }) 
                    if(response.data === 1) {
                        alert("Succesfully updated!");
                    }
                }
            }
        });

        app.mount("#app");
    </script>
</div>