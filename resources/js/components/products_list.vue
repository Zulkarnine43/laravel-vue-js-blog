<template>
    <table border="1px">
        <tr>
            <th>#</th>
             <th>username</th>
              <th>crop_name</th>
               <th>crop_session</th>
                <th>crop_type</th>
                 <th>crop_quantity</th>
                  <th>crop_location</th>
                <th>bid_rate</th>
              <th>crop_description</th>
               <th>last_date_bidding</th>
                <th>crop_image</th>
                <th>Action</th>
        </tr>

        <tr v-for="(product, id) in products" :key="id">
         <td>{{product.id}}</td>
         <td>{{product.username}}</td>
         <td>{{product.crop_name}}</td>
         <td>{{product.crop_session}}</td>
         <td>{{product.crop_type}}</td>
         <td>{{product.crop_quantity}}</td>
         <td>{{product.crop_location}}</td>
         <td>{{product.bid_rate}}</td>
         <td>{{product.crop_description}}</td>
         <td>{{product.last_date_bidding}}</td>
         <td><img :src="product.crop_image" /></td>
         <td>
             <a @click="editProducts(product)" href="">Edit</a>
              <a @click="deleteProducts(product.id)" href="">Delete</a>
         </td>
        </tr>


    </table>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            products:[]
        }
    },
    methods:{
     editProducts(product){
         this.product.username=product.username;
         this.product.crop_name=product.crop_name;
         this.product.crop_session=product.crop_session;
         this.product.crop_type=product.crop_type;
         this.product.crop_quantity=product.crop_quantity;
         this.product.crop_location=product.crop_location;
         this.product.bid_rate=product.bid_rate;
         this.product.crop_description=product.crop_description;
         this.product.last_date_bidding=product.last_date_bidding;
        //  this.product.crop_image=product.crop_image;
         this.edit=true;
         $('#submit').text('Update');
     },
     deleteProducts(id)
        {
            axios.delete('http://localhost/blog/public/api/products/'+id)
                .then(res =>{
                   alert('delete sucessfully');
                })
                .catch(err => console.log(err));
        },  
clearform(){
        this.product.username='';
         this.product.crop_name='';
         this.product.crop_session='';
         this.product.crop_type='';
         this.product.crop_quantity='';
         this.product.crop_location='';
         this.product.bid_rate='';
         this.product.crop_description='';
         this.product.last_date_bidding='';
         this.product.crop_image='';
         this.edit=false;
     }
      },
    mounted(){
        axios.get('http://localhost/blog/public/api/products')
                .then(res =>{
                    this.products=res.data;
                })
                .catch(err => console.log(err));
            }


    }
</script>