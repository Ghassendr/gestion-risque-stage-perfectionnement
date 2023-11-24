<template>
  <div class="all">
    <div id="loading">
      <video id="bgvideo" autoplay loop>
        <source src="../assets/HEADER_VIDEO_TESSI.mp4" type="video/mp4">
      </video>
    </div>
    <div class="show">
      <table class="table table-hover">
        <thead>
          <tr>

            <th scope="col" style="color: white;">type</th>
          </tr>
        </thead>
        <tbody class="bod" style="color: black;">
          <tr v-for="actifs in result" v-bind:key="actifs.id">
            <td @click="ajouter(actifs)"> <span><i class="bi bi-plus-square-fill" /> {{ actifs.type }} </span> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="add">
      <form @submit.prevent="save">
        <br>
        <div class="divis" style="color: black;">
          <div>

            <div class="mb-3">
              <input type="text" v-model="risque.name" class="form-control" placeholder="Actif" >

            </div>

            <div class="mb-3">
              <input type="text" placeholder="Vulnérabilite / cause possible" v-model="risque.cause"
                class="form-control" id="exampleInputPassword1">

            </div>

            <div class="mb-3">

              <input type="text" placeholder="Menace" v-model="risque.menaces" class="form-control"
                id="exampleInputPassword1">

            </div>
            <div class="mb-3">

              <input type="text" class="form-control" placeholder="niveau criticite" id="exampleInputPassword1"
                v-model="risque.niveaucrit">
            </div>
            <div class="mb-3">
              <label for="">Proprietaire du risque</label>
              <select id="disabledSelect" class="form-select" v-model="risque.proprietaire">
                <option></option>
                <option>Directeur system dinformation</option>
                <option>Directeur RH</option>
              </select>
            </div>

            <div class="mb-3">
              <label>Vraisemblance</label>
              <select id="disabledSelect" placeholder="Vraisemblance" class="form-select"
                v-model="risque.vraisemblance">
                <option></option>
                <option>Faible</option>
                <option>Moyen</option>
                <option>Eleve</option>
              </select>
            </div>
            <div class="mb-3">
              <label>Satisfaction</label>
              <select id="disabledSelect" class="form-select" v-model="risque.satisfaction">
                <option>1</option>
                <option>2</option>
                <option>3</option>

              </select>
            </div>
          </div>
          <div>
            <div class="mb-3">

              <input type="text" placeholder="criticite" class="form-control" id="exampleInputPassword1"
                v-model="risque.criticite">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Type : c | i | d" id="disabledSelect"
                v-model="risque.type">

            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Facilite d'exploitation" id="exampleInputPassword1"
                v-model="risque.facilite">
            </div>
            <div class="mb-3">

              <input type="text" placeholder="Mesure de securite existante" class="form-control"
                id="exampleInputPassword1" v-model="risque.mesuressec">

            </div>
            <div class="mb-3">
              <label>Finanicer</label>
              <select id="disabledSelect" class="form-select" v-model="risque.financier">
                <option>1</option>
                <option>2</option>
                <option>3</option>

              </select>
            </div>

            <div class="mb-3">
              <label>Image</label>
              <select id="disabledSelect" class="form-select" v-model="risque.image">
                <option>1</option>
                <option>2</option>
                <option>3</option>

              </select>
            </div>
            <div class="mb-3">
              <label>Comfirmite</label>
              <select id="disabledSelect" placeholder="Comfirmite" class="form-select" v-model="risque.confirmite">
                <option>1</option>
                <option>2</option>
                <option>3</option>

              </select>
            </div>

          </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>

    </div>
  </div>
</template>

<script>

import Vue from 'vue'
import axios from 'axios'
Vue.use(axios)
export default {
  name: 'RisqueToAddView',

  data () {
    return {
      result: {},
      risque: {
        id: '',
        name: '',
        cause: '',
        menaces: '',
        proprietaire: '',
        type: '',
        mesuressec: '',
        financier: '',
        image: '',
        confirmite: '',
        satisfaction: '',
        impacte: '',
        facilite: '',
        vraisemblance: '',
        indice: '',
        criticite: '',
        niveaucrit: ''
      }

    }
  },
  created () {
    this.ActifsLoad()
  },
  methods: {
    ActifsLoad () {
      var page = 'http://127.0.0.1:8000/api/actifs2'
      axios.get(page)
        .then(
          ({ data }) => {
            console.log(data)
            this.result = data
          }
        )
    },
    ajouter (actifs) {
      this.risque.name = actifs.type
    },
    save () {
      this.saveData()
      // alert(this.risque.image)
    },
    saveData () {
      this.risque.impacte = Math.max(this.risque.financier, this.risque.satisfaction)
      switch (this.risque.vraisemblance) {
        case 'Faible':
          this.risque.indice = 1
          break
        case 'Moyen':
          this.risque.indice = 2
          break
        case 'Eleve':
          this.risque.indice = 3
          break
      }
      axios.post('http://127.0.0.1:8000/api/savee', this.risque)
        .then(
          ({ data }) => {
            alert('saveeeed')
          }

        )
    }

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.all {
  display: grid;
  grid-template-columns: 40% 60%;
  padding-top: 100px;
}

.bod {
  display: grid;
  grid-template-columns: 50% 50%;
  justify-content: center;

}
.add {
  padding-top: 15px;
}
.bod td {
  display: grid;
  justify-content: start;
}

.divis {

  display: grid;
  justify-content: center;
  grid-template-columns: 40% 40%;
  grid-gap: 15px;
}

#loading {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1000;
  width: 90vw;
  height: 90vh;
  background-color: rgba(192, 192, 192, 0.5);
}

#bgvideo {
  position: fixed;
  right: 0;
  bottom: 0;
  width: 100%;
  min-height: 100%;
}
.show {
  padding-left: 100px;
}
</style>
