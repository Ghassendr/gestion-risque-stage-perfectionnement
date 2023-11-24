<template>
  <div class="hello">
    <div class="add">

      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 2s00px;">
    Options d'Ajout
  </button>
  <ul class="dropdown-menu" style="width: 200px;">
    <br>
    <router-link to="./RisqueToAddView">
        <h6>les nouveau risque <i class="bi bi-plus-circle"></i></h6>
      </router-link>

  </ul>

</div>

      <br>
    </div>

    <div class="twtw">
  <div><br></div>

  <div><br></div><div id="App" class="container">
      <div>
        <table id="myTable" class=" table-bordered border table-hover" style="width: 2800px;">
          <thead style="border-bottom: 1px black solid;">
            <br>
            <tr style="border: 2px;">

              <th scope="col" class="border">Actif</th>
          <th scope="col" class="border"  >Vulnerabilite /causes possible</th>
          <th scope="col" class="border" >Menace</th>
          <th scope="col" class="border">Proprietaire du risque</th>
          <th scope="col" class="border">Type(c/i/d)</th>
          <th scope="col" class="border">Mesures de securité existantes</th>
          <th scope="col" class="border">Financier</th>
          <th scope="col" class="border">Image</th>
          <th scope="col" class="border">confirmite</th>
          <th scope="col" class="border">satisfaction</th>
          <th scope="col" class="border">Impacte</th>
          <th scope="col" class="border">Facilite de lexploitation</th>
          <th scope="col" class="border">Vraisemblance</th>
          <th scope="col" class="border">indice de vraisemblance</th>
          <th scope="col" class="border">Criticité Actuelle</th>
          <th scope="col" class="border">Niveau de criticite</th>
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
        <tr v-for="risque in result" v-bind:key="risque.risqueId"  style="display: grid;grid-gap: 15rem;padding-top: 5px;padding-bottom:5px;">

        <i id="ico" class="bi bi-trash3-fill" @click="remove(risque)" style="cursor: pointer;"></i>
        </tr>
      </tbody>
    </table>

    </div>

  </div>

  </div>
</template>

<script>
import $ from 'jquery'
import Vue from 'vue'
import axios from 'axios'
Vue.use(axios)
export default {
  name: 'RisqueView',
  data () {
    return {
      result: {}
    }
  },
  created () {
    this.RisqueLoad()
  },
  mounted () {
    this.getUsers()
  },
  methods: {
    getUsers () {
      axios
        .get('http://127.0.0.1:8000/api/risques')
        .then((response) => {
          $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['colvis', 'excel', 'print', 'csv'],
            data: response.data,
            columns: [
              { data: 'name' },
              { data: 'cause' },
              { data: 'menaces' },
              { data: 'proprietaire' },
              { data: 'type' },
              { data: 'mesuressec' },
              { data: 'financier' },
              { data: 'image' },
              { data: 'confirmite' },
              { data: 'satisfaction' },
              { data: 'impacte' },
              { data: 'facilite' },
              { data: 'vraisemblance' },
              { data: 'indice' },
              { data: 'criticite' },
              { data: 'niveaucrit' }

            ]
          })
        })
        .catch((error) => console.log(error.response))
    },
    RisqueLoad () {
      var page = 'http://127.0.0.1:8000/api/risques'
      axios.get(page)
        .then(
          ({ data }) => {
            console.log(data)
            this.result = data
          }
        )
    },
    remove (risque) {
    // var url = 'http://127.0.0.1:8000/api/delete/${employee.id}';
      var url = 'http://127.0.0.1:8000/api/deleterisque/' + risque.id
      if (confirm('are you sure to delete ')) {
        axios.delete(url)
        alert('Deleteddd')
        this.RisqueLoad()
      }
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
  margin-right: 890px;
  margin-top: 15px;
}

.add h4 {
  color: green;

}

a:link {
  color: #000000;
  text-decoration: none;
  color: green;
}
.hello {
  width: 150%;
}
.container {
  display: grid;
  margin-left: 0px;
  width: 1000px;

}

#myTable_wrapper {
  padding-right: 0px;
}

#myTable_filter {
  padding-right:1000px;
}

.twtw {
  display: grid;
  grid-template-columns: 2810px 70px;
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
