<template>
  <div class="add">
    <b-container>
    <h3>Escolha a categoria que você quer adicionar um item</h3>
    <b-form-select 
    value-field="attributes_template"  
     text-field="name" v-on:change="getSelectedItems" v-model="selected" 
     :options="categories"></b-form-select>
  
    <b-form v-if="selected" @submit="onSubmit" >
      <br>
      <b-form-group
        id="input-group-att"
      >
        <b-form-input
          type="text"
           v-model="nome"
          required
        ></b-form-input>
                <b-form-input
          type="text"
           v-model="description"
          required
        ></b-form-input>
      </b-form-group>

      <div v-for="att in selected" :key="att.id">
      <b-form-group
        id="input-group-att"
      >
        <b-form-input
          type="text"
           v-model="attributes[att.id]"
          v-bind:placeholder="att.description"
          required
        ></b-form-input>
      </b-form-group>
      </div>
      <br>
      <br>
      <b-button type="submit" variant="primary">Submit</b-button>
       </b-form>
       </b-container>
    </div>
</template>

<script>
import axios from 'axios';
// import Axios from 'axios';

// const api = Axios.create({
//   baseURL: 'localhost:8000',
//   headers: {
//     "Content-Type": "application/json",
//   },
// });

export default {
  name: 'List',
  data () {
    return {
      selected: null,
      categories:null,
      items: null,
      category_template_id:null,
      articleId: null,
      attributes: {
        },
      nome:null,
      description:null

    }
  },
  async mounted () {
    let response = await axios.get('http://localhost:8000/category');
    this.categories = response.data;
    console.log(this.categories);
  },
  methods: {
    getSelectedItems(){
      console.log("get");
      console.log(JSON.stringify(this.selected));
      this.category_template_id=this.selected[0].category_template_id;
      // let response = await axios.get('http://localhost:8000/items'  + '?category_template_id=' +this.selected )
      // this.items = response.data;
      // console.log(this.items);
    },
    onSubmit(event) {
      var att = JSON.parse(JSON.stringify(this.attributes));
      var keys = Object.keys(att);
      var values =Object.values(att);
      var myarr = [];
      for(var i=0;i<keys.length;i++){
         var obj = {
           "id_att" :keys[i],
           "data" :values[i],
         }
         myarr.push(obj);
      }
      console.log(myarr);
      this.selected = JSON.parse(JSON.stringify(this.selected));
      const item = { name: this.nome,
                    description: this.description,
                    category_template_id:this.category_template_id,
                    attributes: myarr
                    };
      // item =JSON.parse(JSON.stringify(item));
      // const response = axios.post("http://localhost:8000/items?description=teste&name=tome&attributes%5B0%5D%5Bdescription%5D=Adaptador%20de%20rede&%20attributes%5B0%5D%5Bid_att%5D=6&%20attributes%5B0%5D%5Bdata%5D=Adaptador%20de%20rede&category_template_id=5&attributes%5B1%5D%5Bdescription%5D=teste&%20attributes%5B1%5D%5Bdata%5D=sim&%20attributes%5B1%5D%5Bid_att%5D=6");
      var response = axios.post("http://localhost:8000/items", item).then(function (response) {
                     // handle success
                    alert(JSON.stringify(response.data.message))
                    console.log(response);
                  }).catch(function (error) {
                    // handle error
                    console.log(error);
                  })
    
      event.preventDefault()

      console.log(response);
  

    }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
