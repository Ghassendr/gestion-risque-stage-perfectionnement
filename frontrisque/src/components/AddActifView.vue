<template>
  <div class="all">

    <div id="loading">
      <br>
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
          <tr style="cursor: pointer
          ;" v-for="type in result" v-bind:key="type.id">
            <td @click="ajouter(type)"> <span><i class="bi bi-plus-square-fill" /> {{ type.name }} </span> </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="add">
      <form @submit.prevent="save">
        <div class="mb-3">
          <input type="text" v-model="actif.type" placeholder="le type d'actif" disabled class="form-control">
        </div>
        <div class="mb-3">
          <input type="text" v-model="actif.description" placeholder="le description" class="form-control">
        </div>

        <div class="mb-3">
          <label>processuse</label>
          <select placeholder="processus" v-model="actif.processuse" class="form-select">
            <option>infrastructure</option>
          </select>
        </div>
        <div class="mb-3">
          <label>Proprietaire du l'actif</label>
          <select id="disabledSelect" class="form-select" v-model="actif.proprietaire">
            <option></option>
            <option>Directeur system dinformation</option>
            <option>Directeur RH</option>
          </select>
        </div>
        <div class="sel">
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Confidentialite</label>
            <select id="disabledSelect" v-model="actif.c" class="form-select">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Integrite</label>
            <select id="disabledSelect" v-model="actif.i" class="form-select">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Disponibilite</label>
            <select id="disabledSelect" class="form-select" v-model="actif.d">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <textarea type="text" class="form-control" placeholder="commentaire" v-model="actif.commantaire" />
        </div>
        <button type="submit" class="btn btn-success">Ajouter L'actif</button>
      </form>
    </div>

  </div>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'
Vue.use(axios)
export default {
  name: 'ActifView',
  data () {
    return {
      result: {},
      actif: {
        id: '',
        description: '',
        proprietaire: '',
        type: '',
        processuse: '',
        c: '',
        i: '',
        d: '',
        selectionnee: '',
        commantaire: ''
      }
    }
  },
  created () {
    this.TypeLoad()
  },
  methods: {
    TypeLoad () {
      var page = 'http://127.0.0.1:8000/api/types'
      axios.get(page)
        .then(
          ({ data }) => {
            console.log(data)
            this.result = data
          }
        )
    },
    save () {
      this.saveData()
    },
    saveData () {
      if (this.actif.description === '') {
        this.actif.description = '...'
      }
      if (this.actif.commantaire === '') {
        this.actif.commantaire = '...'
      }
      if (this.actif.c > 2 || this.actif.i > 2 || this.actif.d > 2) {
        this.actif.selectionnee = 'oui'
      } else {
        this.actif.selectionnee = 'non'
      }

      axios.post('http://127.0.0.1:8000/api/save', this.actif)
        .then(
          ({ data }) => {
            alert('saveeeed')
          }

        )
    },
    ajouter (type) {
      this.actif.type = type.name
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

.sel {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 15px
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
.all {
  display: grid;
  grid-template-columns: 40% 60%;
}

.bod {
  display: grid;
  grid-template-columns: 50% 50%;
  justify-content: center;

}

.bod td {
  display: grid;
  justify-content: start;
}

#bgvideo {
  position: fixed;
  right: 0;
  bottom: 0;
  width: 100%;
  min-height: 100%;
}

.add  {
  padding-top: 70px;
width: 900px;
padding-left: 150px;
justify-content: center;}
.show {
  padding-left: 120px;
}
label {
  color: black;
}
</style>
