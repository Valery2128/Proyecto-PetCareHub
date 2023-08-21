<template>
  <div>
    <h1 class="text-center">Gestionar Mascotas</h1>
    <v-data-table
      :headers="headers"
      :items="mascotas"
      class="elevation-1"
      item-key="id"
    >
      <template #item="{ item }">
        <tr>
          <td>{{ item.id }}</td>
          <td>{{ item.nombre }}</td>
          <td>{{ item.edad }}</td>
          <td>{{ item.tipo_mascota }}</td>
          <td>{{ item.rasgos_fisicos }}</td>
          <td>{{ item.tipo_alimento }}</td>
          <td>{{ item.recomendaciones_medicas }}</td>

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
        { text: 'Recomendaciones', value: 'recomendaciones_medicas' },
        // columnas base de datos
      ],
    };
  },
  mounted() {
    this.listar();
  },
  methods: {
    async listar() {
      try {
        const response = await axios.get('/api/mascotas'); // Ajusta la URL 
        this.mascotas = response.data;
      } catch (error) {
        console.error('Error al cargar mascotas:', error);
      }
    },
  },
};
</script>

<style>

</style>
