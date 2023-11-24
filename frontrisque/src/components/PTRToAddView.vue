<template>
  <div class="all">
    <div id="loading">
      <video id="bgvideo" autoplay loop>
        <source src="../assets/HEADER_VIDEO_TESSI.mp4" type="video/mp4">
      </video>
    </div>
    <div class="show" style="color: black;">
      <table class="table table-hover" style="color: black;">
        <thead>
          <tr>

            <th scope="col" style="color:white;" >Les risque cretisque</th>
          </tr>
        </thead>
        <tbody class="bod" style="color: black;">
          <tr v-for="risque in result" v-bind:key="risque.id">
            <td clsass="hov" @click="ajouter(risque)"> <span><i class="bi bi-plus-square-fill" /> {{ risque.name }}
               :{{ risque.cause }} </span> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="add">
      <form @submit.prevent="save">
        <div class="mb-3">
          <input type="text" v-model="ptr.name" placeholder="le nom de lptre" class="form-control">
        </div>
        <div class="mb-3">

<input type="text" placeholder="Musure de securite iso 27001" v-model="ptr.mesureiso" class="form-control">
</div>
<div class="mb-3">

<input placeholder="Action a mettre en place" type="text" v-model="ptr.action" class="form-control">
</div>

        <div class="mb-3">
          <label for="disabledSelect" class="form-label">Traitement</label>
          <select id="disabledSelect" class="form-select" v-model="ptr.traitement">
            <option>Eviter</option>
            <option>Reduire</option>

          </select>
        </div>

        <div class="selec">
          <div class="mb-3">
            <label>Proprietaire du risque</label>
            <select id="disabledSelect" class="form-select" v-model="ptr.responsable">
              <option></option>
              <option>Directeur system dinformation</option>
              <option>Technicien de maintenance</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Etat</label>
            <select id="disabledSelect" class="form-select" v-model="ptr.etat">
              <option></option>
              <option>Realise </option>
              <option>En cours</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Impact</label>
            <select id="disabledSelect" class="form-select" v-model="ptr.impact">
              <option>1</option>
              <option>2</option>
              <option>3</option>

            </select>
          </div>

          <div class="mb-3">
            <label>Efficacite des action</label>
            <select id="disabledSelect" class="form-select" v-model="ptr.efficacite">
              <option></option>
              <option>Partiellement Efficace</option>
              <option>Efficace</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="disabledSelect" class="form-label">Faclite d'exploitation</label>
            <select id="disabledSelect" class="form-select" v-model="ptr.faclite">
              <option>1</option>
              <option>2</option>
              <option>3</option>

            </select>
          </div>

          <div class="mb-3">
            <label for="disabledSelect" class="form-label">vraisemblance</label>
            <select id="disabledSelect" class="form-select" v-model="ptr.vraisemblance">
              <option>1</option>
              <option>2</option>
              <option>3</option>

            </select>
          </div>

        </div>

        <div class="mb-3">

          <textarea type="text" v-model="ptr.commentaire" placeholder="Commentaire de Mesure d'efficacie" class="form-control" />
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
  name: 'PTRToAddView',
  data () {
    return {

      result: {},
      ptr: {
        id: '',
        name: '',
        traitement: '',
        mesureiso: '',
        action: '',
        responsable: '',
        etat: '',
        efficacite: '',
        commentaire: '',
        impact: '',
        faclite: '',
        vraisemblance: '',
        criticiter: '',
        niveaucriticiter: ''

      }
    }
  },
  created () {
    this.PtrLoad()
    this.RisqueLoad()
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
    save () {
      this.saveData()
    },
    saveData () {
      axios.post('http://127.0.0.1:8000/api/add', this.ptr)
        .then(
          ({ data }) => {
            alert('bien enregistrer')
          }

        )
    },
    ajouter (risque) {
      this.ptr.name = risque.name
    },
    RisqueLoad () {
      var page = 'http://127.0.0.1:8000/api/risquecretique'
      axios.get(page)
        .then(
          ({ data }) => {
            console.log(data)
            this.result = data
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
  padding-top: 70px;
  grid-gap: 20px;
}

.bod {
  display: grid;
  justify-content: center;

}

.add {
  padding-top: 38px;
  width: 800px;
  padding-left: 170px;
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
  color: black;
  padding-top:0px;
}
.hello {

justify-content: center;
width: 750px;
}

.ptr {
display: grid;
grid-template-columns: 25% 75%;
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

.for {
display: grid;
/* width:; */
justify-content: center;

}

#bgvideo {
position: fixed;
right: 0;
bottom: 0;
width: 100%;
min-height: 100%;
}

td .hov {
background-color: red;

}

label {
color: black;
}

.selec {
display: grid;
grid-template-columns: 1fr 1fr;
grid-gap: 15px;

}
</style>
