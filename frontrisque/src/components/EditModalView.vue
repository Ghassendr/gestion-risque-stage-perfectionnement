<template>
    <div>
    <div v-if="openClose" class="modal fade show" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
        role="dialog" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" @click="oCloseFun()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="oCloseFun()" :class="'btn btn-' + varaiant">Close</button>

                </div>
            </div>
        </div>
    </div>
    <button type="button" @click="oCloseFun()" :class="'btn btn-'+varaiant">open modal</button>
</div>
</template>

<script>

export default {
  name: 'EditModalView',
  props: {
    visible: Boolean,
    varaiant: String

  },
  data () {
    return {
      openClose: this.visible
    }
  },
  method: {
    oCloseFun () {
      this.openClose = !this.openClose
    }
  },
  watch: {
    visible: function (newVal, oldVal) {
      this.openClose = newVal
      console.log('new' + newVal + '==' + oldVal)
    }
  }

}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
