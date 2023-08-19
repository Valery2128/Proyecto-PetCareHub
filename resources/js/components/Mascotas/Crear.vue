<template>
    <div>
      <v-form @submit.prevent="submitForm">
        <v-text-field v-model="nombre" label="Nombre"></v-text-field>
        <v-text-field v-model="edad" label="Edad"></v-text-field>
        <v-text-field v-model="tipo" label="Tipo de mascota"></v-text-field>
        <v-text-field v-model="rasgos" label="Rasgos físicos"></v-text-field>
        <v-text-field v-model="alimento" label="Tipo de alimento"></v-text-field>
        <v-text-field v-model="recomendacion" label="Recomendaciones"></v-text-field>
        <v-text-field v-model="cuidado" label="Cuidados"></v-text-field>
        <v-btn type="submit" color="primary">Registrar</v-btn>
      </v-form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        nombre: '',
        edad: '',
        tipo: '',
        rasgos: '',
        alimento: '',
        recomendacion: '',
        cuidado: '',
      };
    },
    methods: {
      submitForm() {
        axios
          .post('/registrar-mascota', {
            nombre: this.nombre,
            edad: this.edad,
            tipo: this.tipo,
            rasgos: this.rasgos,
            alimento: this.alimento,
            recomendacion: this.recomendacion,
            cuidado: this.cuidado,
          })
          .then((response) => {
            console.log(response.data); // Maneja la respuesta del servidor
          })
          .catch((error) => {
            console.error(error); // Maneja los errores
          });
      },
    },
  };
  </script>
  