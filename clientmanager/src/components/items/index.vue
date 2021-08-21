<template>
  <div class="items">
    <b-container>
    <h3>List</h3>
    <b-form-select value-field="id"  v-on:change="getSelectedItems"  text-field="name" v-model="selected" :options="categories"></b-form-select>
    <div>
    <b-table striped hover :items="items"></b-table>
  </div>
</b-container>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'List',
  data () {
    return {
      selected: null,
      categories:null,
      items: null
    }
  },
  async mounted () {
    let response = await axios.get('http://localhost:8000/category');
    this.categories = response.data;
    console.log(this.categories);
  },
  methods: {
    async getSelectedItems(){
      console.log("get");
      let response = await axios.get('http://localhost:8000/items'  + '?category_template_id=' +this.selected )
      this.items = response.data;
      console.log(this.items);
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
