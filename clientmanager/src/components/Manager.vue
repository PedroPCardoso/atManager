<template>
  <div class="hello">
    <h1>Manager</h1>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Manager',
  data () {
    return {
      info: null
    }
  },
  mounted () {
    axios
      .get('http://localhost:8000/items?category_template_id=1')
      .then(response => (
        this.info = response))
    console.log(this.info);
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
