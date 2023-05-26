<template>
    <section>
        <h1>Friends List</h1>
       <form>
        <table>
           <tr>
            <td>Name</td>
            <td><input type="text" v-model="friend.name"></td>
            </tr>
            <tr>
            <td>Phone</td>
            <td><input type="text" v-model="friend.phone"></td>
            </tr> 
            <tr>
            <td>Email</td>
            <td><input type="text" v-model="friend.email"></td>
            </tr>
            <tr>
                <td></td>                
                <td>
                    <button  @click.stop.prevent="sundData">Sund</button>
                    <button  @click.stop.prevent="clearData">Clear</button>
                </td>
            </tr>

        </table>
        </form> 

       <h3>{{friend}}</h3> 
    </section>
</template>

<script>
import axios from 'axios';

export  default{
        data(){
            return{
                friend:{
                    name:"",
                    phone: "",
                    email: ""
                },
            };
        } ,
        methods:{
            sundData(){
                // e.prevenDefault();
                console.log("sendData active !!!");    
             axios
                .post("http://localhost:82/php/api.php", {
                 name: this.friend.name,
                 phone: this.friend.phone,
                 email: this.friend.email,
                 })
                 .then(function (response) {
                 console.log(response);
                 })
                 .catch(function (error) {
                 console.log(error);
                 });


                // this.clearData();
            },
            clearData(){
                this.friend.name ="ทดสอบ";
                this.friend.phone ="ทดสอบ";
                this.friend.email ="ทดสอบ";
            }
        } , 
};
</script>
