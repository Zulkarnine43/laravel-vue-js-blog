<template>
    <span>
         <!-- end header -->
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Blog left sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Blog with left sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
  
            <article v-for="(post,idx) in postItem" :key="idx">
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{post.title}}</a></h3>
                    </div>
                    <img :src="`${post.photo}`" alt="" />
                  </div>
                  <p>
                   {{post.description}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                      <li><i class="icon-user"></i><a href="#">{{post.user_id}}</a></li>
                      <li><i class="icon-folder-open"></i><a href="#"> {{post.cat_id}}</a></li>
                      <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                    </ul>
                    <router-link :to="`/blog/${post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                  </div>
                </div>
              </div>
            </article>
          
            <div id="pagination">
              <span class="all">Page 1 of 3</span>
              <span class="current">1</span>
              <a href="#" class="inactive">2</a>
              <a href="#" class="inactive">3</a>
            </div>
          </div>
         <BlogSidebar/>
        </div>
      </div>
    </section>
    </span>
</template>

<script>
    import BlogSidebar from "./BlogSidebar.vue"
    export default {
        components:{
            BlogSidebar
        },
      data(){
            return{
                postItem:[],
            }
        },
        mounted(){
                if(this.$route.params.id!=null){
                axios.get('http://localhost/blog/public/api/categorypost/'+this.$route.params.id)
                .then(res =>{
                    this.postItem=res.data;
                })
                .catch(err => console.log(err));
                }else{
                  axios.get('http://localhost/blog/public/api/blogpost')
                  .then(res =>{
                      this.postItem=res.data;
                  })
                  .catch(err => console.log(err));
                }
        },

      
    }
</script>

<style scoped>
</style>