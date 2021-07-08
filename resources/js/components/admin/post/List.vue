<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-post" style="color:#fff"> Add New Post</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>

                                    <th>Sl</th>
                                    <!-- <th>User</th> -->
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Photo</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(post,index) in postItem" :key="index">
                                    <td>{{index+1}}</td>
                                    <!-- <td >{{post.user.name}}</td> -->
                                    <td >{{post.cat_id}}</td>
                                    <td>{{post.title}}</td>
                                    <td>{{post.description}}</td>
                                    <td><img :src="post.photo" alt="" width="40" height="50"></td>
                                    <td>
                                        <router-link :to="`edit-post/${post.id}`">Edit</router-link>
                                        <a href="" @click.prevent = "deletePost(post.id)" >Delete</a>

                                    </td>
                                </tr>
                                </tbody>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
          data(){
            return{
                postItem:[],
            }
        },
       mounted(){
            axios.get('http://localhost/blog/public/api/post')
                .then(res =>{
                    this.postItem=res.data;
                })
                .catch(err => console.log(err));
        },
        methods:{
            deletePost(id){
               axios.delete('http://localhost/blog/public/api/delete/'+id)
                   .then(()=>{
                       alert('are you sure');
                    //    this.$router.push('/post-list');
                   }).catch((err)=>{
                         console.log(err);
                   })
            }
        }
    }
</script>

<style scoped>

</style>