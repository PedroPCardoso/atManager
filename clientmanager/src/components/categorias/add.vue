<template>
  <div class="add">
    <b-container>
    <h3>Criar uma nova categoria</h3>
   
  
    <b-form inline @submit="onSubmit" >
      <br>
      <b-form-group
        id="input-group-att"
      >
        <b-form-input
        id="inline-form-input-name"
      class="mb-2 mr-sm-2 mb-sm-0"
          type="text"
          placeholder="name"
           v-model="nome"
          required
        ></b-form-input>
<br>

                <b-form-input
               id="inline-form-input-name"
      class="mb-2 mr-sm-2 mb-sm-0"
          type="text"
          placeholder="description"
           v-model="description"
          required
        ></b-form-input>
      </b-form-group>
<br>
<br>
      <div v-for="att in selected" :key="att">
      <b-form-group class="mb-2"
        id="input-group-att"
      >
        <b-form-input
          type="text"
          placeholder="Nome do atributo"
          v-model="names[att]"
          required
        ></b-form-input>
        <b-form-input
          type="text"
          placeholder="Descrição do atributo"
          v-model="descriptions[att]"
          required
        ></b-form-input>
      
       </b-form-group>
   <!-- <b-form-group
        id="input-group-att"
      >
        <b-form-input
          type="text"
          v-model="attributes[att]['description']"
          required
        ></b-form-input>


      </b-form-group>  -->
      

      </div>
      <br>
      <b-button type="button" v-on:click="addAtt" variant="primary">add attribute</b-button>
      <br>
      <br>
      <b-button type="submit" variant="primary">Submit</b-button>
       </b-form>
       </b-container>
    </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'List',
  data () {
    return {
      selected: [0],    
      categories:null,
      checked:false,
      items: null,
      names:[],
      descriptions:[],
      required:[false,],
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
    addAtt(){
      this.selected.push([this.selected.length]);
      console.log("get");
      console.log(JSON.stringify(this.selected));
      // let response = await axios.get('http://localhost:8000/items'  + '?category_template_id=' +this.selected )
      // this.items = response.data;
      // console.log(this.items);
    },
    onSubmit(event) {
      var myarr = [];
      for(var i=0;i<this.selected.length;i++){
         var obj = {
           "name" :this.names[i],
           "description" :this.descriptions[i]
         }
         myarr.push(obj);
      }
      console.log(myarr);
      this.selected = JSON.parse(JSON.stringify(this.selected));
      const category = { name: this.nome,
                    description: this.description,
                    attributes: myarr
                    };
      console.log(category);
      var response = axios.post("http://localhost:8000/category", category).then(function (response) {
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
