<template>
  <div class="hello">
    <h1>Manager</h1>
<b-list-group>
  <b-list-group-item href="create">Criar uma Categoria</b-list-group-item>
  <b-list-group-item href="add">Adicionar Item</b-list-group-item>
  <b-list-group-item href="list">Listar Items</b-list-group-item>
</b-list-group>
  </div>
</template>

<script>
export default {
  name: 'Manager',
 
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
