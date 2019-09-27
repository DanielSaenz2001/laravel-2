<template>
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header text-primary text-center">
               <h3>Creacion de Cliente</h3></div>
               <div class="card-body">
                   <form action="" v-on:submit.prevent="newThema()">

                       <div class="form-group">
                           <label for="titulo">Mi título de Investigación es:</label>
                           <input type="text" class="form-control" name="titulo" v-model="titulo" placeholder="Ingrese su tema">
                       </div>
                       <div class="form-group">
                           <label for="titulo">Descripcion Breve:</label>
                           <textarea class="form-control" v-model="descripcion" placeholder="Ingrese descripcion breve de su tema de investigacion" ></textarea>
                       </div>
                       <div class="row">
                           <div class="col-md-6 form-group">
                               <label for="titulo">Fecha de Inicio:</label>
                               <input type="date" class="form-control" name="titulo" v-model="fecha" placeholder="Fecha de Inicio">
                           </div>
                           <div class="col-md-6 form-group">
                               <label for="asesor">Nombre de Asesor</label>
                               <input type="text" class="form-control" name="asesor" v-model="asesor" placeholder="Nombre de su Asesor">
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-12 text-right">
                               <button type="submit" class="btn btn-outline-primary"> Guardar Tema</button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</template>

<script>
    export default {
        data() {
            return {
                titulo: '',
                descripcion: '',
                fecha: '',
                asesor: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newThema() {
               const params = {
                   titulo: this.titulo,
                   descripcion: this.descripcion,
                   fecha: this.fecha,
                   asesor: this.asesor,
               };
               axios.post('/tema', params).then(response => {
                   const tema = response.data;
                   this.$emit('new', tema);
               });
               this.titulo = '';
               this.descripcion= '';
               this.fecha= '';
               this.asesor= '';
            }
        }
    }
</script>
