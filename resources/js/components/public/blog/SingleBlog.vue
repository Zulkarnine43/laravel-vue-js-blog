<template>
    <span id="singleblog">
        <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#"> {{singlepost.title}}</a></h3>

                    </div>
                    <img :src="singlepost.photo" :alt="singlepost.title" />
                  </div>
                  <p>
                   {{singlepost.description}}
                  </p>

                  <div class="bottom-article">
                    <ul class="meta-post">
                      <!-- <li><i class="icon-user"></i><a href="#"> {{singlepost.user.name}}</a></li> -->
                      <li><i class="icon-folder-open"></i><a href="#"> {{singlepost.cat_id}}</a></li>

                    </ul>
                  </div>
                </div>
              </div>
            </article>

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
                singlepost:[],
            }
        },
       mounted(){
            axios.get('http://localhost/blog/public/api/singlepost/'+this.$route.params.id)
                .then(res =>{
                    this.singlepost=res.data;
                })
                .catch(err => console.log(err));
        },
        methods:{
        }
    }
</script>

<style scoped>
</style>