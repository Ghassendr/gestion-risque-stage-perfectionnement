
<template>
  <div class="hello">
    <div class="add">

      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
          style="width: 2s00px;">
          Options d'Ajout
        </button>
        <ul class="dropdown-menu" style="width: 200px;">
          <br>
          <router-link to="./PtrToAddView">
            <h6>les nouveau risque cretique  <i class="bi bi-plus-circle"></i></h6>
          </router-link>

        </ul>

      </div>

      <br>
    </div>

    <div class="twtw">
      <div><br></div>

      <div><br></div>
      <div id="App" class="container">
        <div>
          <table id="myTable" class=" table-bordered border table-hover" style="width: 2500px;">
            <thead style="border-bottom: 1px black solid;">
              <br>
              <tr style="border: 2px;">

                <th scope="col" class="border">name</th>
                <th scope="col" class="border">Traitement</th>
                <th scope="col" class="border">Mesure de securite iso 27001</th>
                <th scope="col" class="border">Action a mettre en place</th>
                <th scope="col" class="border">Responsable d'action</th>
                <th scope="col" class="border" style="width: 60px;">etat</th>
                <th scope="col" class="border">Efficacite des action</th>
                <th scope="col" class="border">Commentaire de Mesure d'fficacite</th>
                <th scope="col" class="border">Impact</th>
                <th scope="col" class="border">Facilite d'exploitation</th>
                <th scope="col" class="border">Vraisemblance</th>
                <th scope="col" class="border">creticite Residuelle</th>
                <th scope="col" class="border">Niveau creticite Residuelle</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="ww">
        <table class="table ">
          <tbody>
            <tr v-for="ptr in result" v-bind:key="ptr.risqueId"
              style="display: grid;grid-gap: 15rem;padding-top: 33px;padding-bottom:5px;">

              <i id="ico" class="bi bi-trash3-fill" @click="remove(ptr)" style="cursor: pointer;"></i>
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
  name: 'PTRView',
  data () {
    return {
      result: {}
    }
  },
  created () {
    this.PtrLoad()
  },
  mounted () {
    this.getPtr()
  },
  methods: {
    PtrLoad () {
      var page = 'http://127.0.0.1:8000/api/ptrs'
      axios.get(page)
        .then(
          ({ data }) => {
            console.log(data)
            this.result = data
          }
        )
    },
    getPtr () {
      axios
        .get('http://127.0.0.1:8000/api/ptrs')
        .then((response) => {
          $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['colvis', 'excel', 'print', 'csv'],
            data: response.data,
            columns: [
              { data: 'name' },
              { data: 'traitement' },
              { data: 'mesureiso' },
              { data: 'action' },
              { data: 'responsable' },
              { data: 'etat' },
              { data: 'efficacite' },
              { data: 'commentaire' },
              { data: 'impact' },
              { data: 'faclite' },
              { data: 'vraisemblance' },
              { data: 'criticiter' },
              { data: 'niveaucriticiter' }

            ]
          })
        })
        .catch((error) => console.log(error.response))
    },
    remove (ptr) {
      // var url = 'http://127.0.0.1:8000/api/delete/${employee.id}';
      var url = 'http://127.0.0.1:8000/api/deleteptr/' + ptr.id
      if (confirm('supprimer ?')) {
        axios.delete(url)
        alert('c ')
        this.ptrLoad()
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
  margin-right: 15px;
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

.add {
  display: grid;
  text-decoration: none;
  justify-content: end;
  margin-right: 890px;
  margin-top: 15px;
}

.hello {
  width: 150%;
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
  padding-right: 1000px;
}

.twtw {
  display: grid;
  grid-template-columns: 2530px 70px;
}

.ww {
  display: grid;
  padding-top: 115px;
}

th {
  background-color: rgba(2, 1, 29, 0.733);
  color: rgb(255, 255, 255);
}
.body{
  background-color: rebeccapurple;
}
</style>
