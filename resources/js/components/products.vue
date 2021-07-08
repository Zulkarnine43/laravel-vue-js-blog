<template>
       <section>
  
        <form @submit.prevent="add_products">
             <div>
                <h1 class="text-center">Import Here</h1>
            </div>

            <div class="form-group">
                <input type="hidden" v-model="product.username" class="form-control" value="zulkarnine"/>
            </div>

            <div class="form-group">
                <label class="font-weight-bolder">Product Name</label>
                <input type="text" v-model="product.crop_name" class="form-control"  required>
            </div>

            <div class="form-group">
                <label class="font-weight-bolder">Product Sesssion</label>
                <select class="form-control" v-model="product.crop_session" required>
                    <option value="">---Select a session</option>
                    <option value="Summer">Summer</option>
                     <option value="Winter">Winter</option>
                      <option value="Monsoon">Monsoon</option>
                </select>
            </div>

            <div class="form-group">
                <label class="font-weight-bolder">Product Type</label>
                <select class="form-control" v-model="product.crop_type" required>
                    <option value="fruits">fruits</option>
                    <option value="vegetables">vegetables</option> 
                    <option value="seeds">seeds</option> 
                    <option value="cash">cash</option> 
                    <option value="Flowers">Flowers</option> 
                    <option value="Sapling">Sapling</option>     
                </select>
            </div>

            <div class="form-group">
                <label class="font-weight-bolder">Product Quantity</label>
                <input type="text" v-model="product.crop_quantity" class="form-control"  placeholder="Ex.Pics, kg,bighas,tree ..Etc" required/>
              
            </div>

            <div class="form-group">
                <label class="font-weight-bolder">Product Location</label>
                <input type="text" v-model="product.crop_location" class="form-control"  placeholder="93/A,kolabagan,Dhaka" required/>

            </div>

            <div class="form-group">
                <label class="font-weight-bolder"> Bidding Rate</label>
                <input type="text" v-model="product.bid_rate" class="form-control" placeholder="Ex.Minimum amount(TK) bidding start" min="1" required/>

            </div>

 
            <div class="form-group">
                <label class="font-weight-bolder">Product Description</label>
                <textarea  class="form-control" v-model="product.crop_description" placeholder="crop description here" required></textarea>
            </div>

            <div class="form-group">
                <label class="font-weight-bolder"> Finished Date of Bidding</label>
                <input type="date" v-model="product.last_date_bidding" class="form-control" placeholder="" required/>
            </div>

            <div class="form-group">
                <label class="font-weight-bolder">Add Product image-</label><br>
                <input type="file"  ref="file" v-on:change="onFileChange()" accept="image/*" required>
            </div>

              <button id="submit" type="submit">Save</button>
        </form>

       <router-link to="/foo">Go to Foo</router-link>
       <router-link to="/bar">Go to Bar</router-link>
        <router-view></router-view>
        <list></list>

   </section>

</template>

<script>
import axios from 'axios';
import list from './products_list.vue';
    export default {
           data(){
              return{ 
                  product:{
                  username:'zulkarnine',
                   crop_name:'',
                    crop_session:'',
                   crop_type:'',
                    crop_quantity:'',
                   crop_location:'',
                    bid_rate:'',
                   crop_description:'',
                    last_date_bidding:'',
                    crop_image:''
               },
               edit:false
              }
           },
           methods:{
               add_products() {
                 let formData= new FormData();
                formData.append('username',this.product.username);
                formData.append('crop_name',this.product.crop_name);
                formData.append('crop_session',this.product.crop_session);
                formData.append('crop_type',this.product.crop_type);
                formData.append('crop_quantity',this.product.crop_quantity);
                formData.append('crop_location',this.product.crop_location);
                formData.append('bid_rate',this.product.bid_rate);
                formData.append('crop_description',this.product.crop_description);
                formData.append('last_date_bidding',this.product.last_date_bidding);
                formData.append('crop_image',this.product.crop_image);

                 axios.post('http://localhost/blog/public/api/products',formData,{
                     headers:{
                         'Content-Type':'multipart/form-data'
                     }
                 })
                .then(res =>{
                    alert('Student Added Successfully');
                    console.log(res);
                })
                .catch(err => console.log(err));
            },
        onFileChange(){
                 this.product.crop_image=this.$refs.file.files[0];
               }
           },
           components:{
               list
           }
           }
</script>