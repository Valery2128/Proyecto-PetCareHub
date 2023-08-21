<template>
  <div>
    <h1 class="text-center">Gestionar Mascotas</h1>
    <v-data-table
      :headers="headers"
      :items="mascotas"
      class="elevation-1"
      item-key="id"
    >
    <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editarMascota(item)">mdi-pencil</v-icon>
        <v-icon small @click="eliminarMascota(item)">mdi-delete</v-icon>
      </template>

    <template>
  <tr v-for="m in mascotas" :key="m.id">
    <td>{{ m.nombre }}</td>
    <td>{{ m.edad }}</td>
    <td>{{ m.tipo_mascota }}</td>
    <td>{{ m.rasgos_fisicos }}</td>
    <td>{{ m.tipo_alimento }}</td>
    <td>{{ m.recomendaciones_cuidado}}</td>
    <!-- <td>{{ m.recomendaciones_medicas }}</td> -->

  </tr>
</template>

    </v-data-table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      mascotas: [],
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Nombre', value: 'nombre' },
        { text: 'Edad', value: 'edad' },
        { text: 'Tipo de Mascota', value: 'tipo_mascota' },
        { text: 'Rasgos Físicos', value: 'rasgos_fisicos' },
        { text: 'Tipo de Alimento', value: 'tipo_alimento' },
        { text: 'Recomendaciones', value: 'recomendaciones_cuidado' },
        { text: 'Acciones', value: 'actions', sortable: false }
        // columnas base de datos
      ],
    };
  },
  mounted() {
    this.listar();
  },
  methods: {
    async listar() {
      const res =await axios.get('mascotas');
      this.mascotas =res.data;
    }
  
  },

  created(){
    this.listar();

  },
}
</script>

<style>

</style>
