<template>
  <div class="hello" >
    <div class="add">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Options d'Ajout
  </button>
  <ul class="dropdown-menu">
    <li><router-link to="./AddActifView"> <h6 ><i class="bi bi-plus-circle"></i> Ajouter un Actif</h6></router-link></li>

    <li   class="add" style="color: green;" data-bs-toggle="modal" data-bs-target="#exampleModal"> <label><i class="bi bi-plus-circle" /> Ajouter un type     </label></li>
  </ul>
</div>
  </div>

<!-- Modal -->
<!-- mod -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un NV type</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
<form @submit.prevent="save">
  <div class="mb-3">
    <input type="text" v-model="type.name" placeholder="le type" class="form-control" >
  </div>
  <div class="mb-3">
    <input type="text"  v-model="type.description" placeholder="la description" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" >Ajouter </button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annuler</button>
</form>

        </div>
      </div>

    </div>
  </div>
</div>

<!-- hethya l modal normally it work  -->
 <div class="twtw">
  <div><br></div>

  <div><br></div><div id="App" class="container">
      <div>
        <table id="myTable" class=" table-bordered border table-hover" style="width: 1700px;">
          <thead style="border-bottom: 1px black solid;">
            <br>
            <tr style="border: 2px;">
              <th class="border  " scope="col">description</th>

              <th class="border  " scope="col">type</th>
              <th class="border  " scope="col" style="width: 300px;">proprietaire</th>
              <th class="border  " scope="col">processuse</th>
              <th class="border  " scope="col">c</th>
              <th class="border  " scope="col">i</th>
              <th class="border  " scope="col">d</th>
              <th class="border  " scope="col">selectionner</th>
              <th class="border  " scope="col">commentaire</th>

            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
    <div class="ww" >
     <table class="table ">
      <tbody>
        <tr v-for="actif in result" v-bind:key="actif.actifId"  style="display: grid;grid-gap: 15rem;padding-top: 5px;padding-bottom:5px;">

        <i id="ico" class="bi bi-trash3-fill" @click="remove(actif)" style="cursor: pointer;"></i>
        </tr>
      </tbody>
    </table>

    </div>

  </div>
  </div>
</template>

<script>
import axios from 'axios'
import Vue from 'vue'
import $ from 'jquery'
import EditModalView from './EditModalView.vue'
Vue.use(axios)
export default {
  name: 'ActifView',
  components: {
    EditModalView
  },
  data () {
    return {

      result: {},
      type: {
        id: '',
        name: '',
        description: ''}
    }
  },
  created () {
    this.ActifLoad()
  },
  mounted () {
    this.getUsers()
  },
  methods: {
    ActifLoad () {
      var page = 'http://127.0.0.1:8000/api/actifs'
      axios.get(page)
        .then(
          ({ data }) => {
            console.log(data)
            this.result = data
          }
        )
    },
    remove (actif) {
    // var url = 'http://127.0.0.1:8000/api/delete/${employee.id}';
      var url = 'http://127.0.0.1:8000/api/delete/' + actif.id
      if (confirm('are you sure to delete ')) {
        axios.delete(url)
        alert('Deleteddd')
        this.ActifLoad()
      }
    },
    save () {
      this.saveData()
    },
    saveData () {
      axios.post('http://127.0.0.1:8000/api/savetype', this.type)
        .then(
          ({data}) => {
            alert('saved')
          }

        )
    },
    getUsers () {
      axios
        .get('http://127.0.0.1:8000/api/actifs')
        .then((response) => {
          $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['colvis', 'excel', 'print', 'csv'],
            data: response.data,
            columns: [
              { data: 'description' },
              { data: 'type' },
              { data: 'proprietaire' },
              { data: 'processuse' },
              { data: 'c' },
              { data: 'i' },
              { data: 'd' },
              { data: 'selectionnee' },
              { data: 'commantaire' }

            ]
          })
        })
        .catch((error) => console.log(error.response))
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1,
h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}
.add {
display: grid;
text-decoration: none;
justify-content: end;
margin-right: 15px;
margin-top: 15px;
}
.add h6 {color: green;
}

.un{
  background-color: green;
}
.deux{
  background-color: yellow;
}
.troi{
background-color: rgb(237, 142, 73);
}
.quatre { background-color: red;

}
a:link
{
    color: #000000;
    text-decoration: none;
    color: green;
}
.container {
  display: grid;
  margin-left: 0px;

}

#myTable_wrapper {
  padding-right: 0px;
}

#myTable_filter {
  padding-left: 1447px;
}

.twtw {
  display: grid;
  grid-template-columns: 1720px 70px;
}
.ww {
display:grid;
padding-top:115px;
}
th
 {
  background-color: rgba(2, 1, 29, 0.733);
 color: rgb(255, 255, 255);
 }

</style>
