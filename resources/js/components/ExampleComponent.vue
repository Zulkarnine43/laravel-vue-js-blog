<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                <h2>Add New </h2>
                         <form @submit.prevent="addStudent">
                            <div>
                        <div >
                            <div >
                            <input type="text"  placeholder="First Name" v-model="student.first_name" autocomplete="off">
                        </div>
                        </div>
                        <div >
                            <div >
                            <input type="text" placeholder="Last Name" v-model="student.last_name" autocomplete="off">
                        </div>
                        </div>
                            <div >
                            <div>
                                <select name=""  id="" v-model="student.gender">
                                    <option value="">-----</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                        </div>
                        </div>
                            <div >
                            <div >
                            <select name=""  v-model="student.country">
                                    <option value="">-----</option>
                                    <option value="The Gambia">The Gambia</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="usa">United State</option>
                                    <option value="australia">Australia</option>
                                </select>
                        </div>
                        </div>
                            <div >
                            <div >
                        <select name=""  v-model="student.class">
                                    <option value="">-----</option>
                                    <option value="class A">Class A</option>
                                    <option value="class B">Class B</option>
                                    <option value="class C">Class C</option>
                                    <option value="class D">Class D</option>
                                </select>
                        </div>
                        </div>
                        <div >
                            <div >
                        <input type="text"  placeholder="Phone Number" v-model="student.phone" autocomplete="off">
                        </div>
                        </div>

                        </div>
                            <div >
                        <div >
                        <button id="submit" type="submit">Save</button>
                            </div>
                            <div >
                        <button type="button">Refresh</button>
                            </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
           data(){
              return{ 
                  student:{
                  first_name:'',
                   last_name:'',
                    gender:'',
                   phone:'',
                    class:'',
                   country:'',
               }
              }
           },
           methods:{
               addStudent() {
                fetch('http://localhost/vue/public/api/v1/students', {
                method: 'post',
                body: JSON.stringify(this.student),
                headers: {
                    'content-type': 'application/json'
                }
                })
                .then(res =>{
                    alert('Student Added Successfully');
                })
                .catch(err => console.log(err));
            }
           }
    }
</script>
