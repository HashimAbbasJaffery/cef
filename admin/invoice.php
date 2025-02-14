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
            </div>
        </div>
        <div class="amounts container-fluid" style="margin-top: 30px;">
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
        <div class="container-fluid" style="margin-top: 30px;">
            <div style="display: flex; justify-content: end; flex-direction: column; align-items: end; ">
                <p style="margin: 0px;">Payable Amount: <span v-text="payments.reduce((sum, item) => sum + item.price, 0)"></span>/-</p>
                <p>Current Payable Amount: <span v-text="payments.reduce((sum, item) =>  item.cp ? sum + item.price : sum, 0)"></span>/-</p>
            </div>
            <button>Save</button>
        </div>
        </div>
    </div>

    <script>
         const app = Vue.createApp({
            data() {
                return {
                    payments: [ {
                        id: 1,
                        description: "",
                        date: "",
                        price: 0,
                        cp: false
                    }],
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
                }
            }
        });

        app.mount("#app");
    </script>
</div>