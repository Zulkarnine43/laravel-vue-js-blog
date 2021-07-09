<template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input @keyup="RealSearch" placeholder="Type something" v-model="keyword" type="text" class="input-medium search-query">
                  <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">

                  <li v-for="(category,idx) in categories" :key="idx"><i class="icon-angle-right"></i><router-link :to="`/categories/${category.id}`">{{category.cat_name}}</router-link><span> (20)</span></li>

                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">

                  <li v-for="(post,index) in blogposts" :key="index">
                    <img :src="`${post.photo}`" class="pull-left" alt="" width="40" height="40"/>
                    <h6><router-link :to="`/blog/${post.id}`">{{post.title}}</router-link></h6>
                    <p>
                     {{post.description}}
                    </p>
                  </li>

                </ul>
              </div>

            </aside>
          </div>
    </span>
</template>

<script>
    export default {
        name: "BlogSidebar",
        data(){
           return {
              categories:[],
               blogposts:[],
               keyword:'',
           }
        },
         mounted(){
           axios.get('http://localhost/blog/public/api/categories')
            .then(res =>{
          //  console.log(res.data);
             this.categories=res.data;
            })
            .catch(err => console.log(err));

            axios.get('http://localhost/blog/public/api/latestpost')
                .then(res =>{
                    this.blogposts=res.data;
                })
                .catch(err => console.log(err));
        },
 
        methods:{
          RealSearch(){
            axios.get('http://localhost/blog/public/api/search?s='+this.keyword)
                .then((response)=>{
                  this.blogposts=response.data;
                   console.log(response);
                })
                 .catch(err => console.log(err));
        }
        }
    }
</script>

<style scoped>
</style>