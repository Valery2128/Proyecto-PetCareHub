<template>
  <div>
    <h1 class="text-center">Gestionar Mascotas</h1>
    <v-data-table
      :headers="headers"
      :items="desserts"
      class="elevation-1"
      item-key="name"
    ></v-data-table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      desserts: [
        {
          name: 'Mascota 1',
          edad: 3,
          tipo_mascota: 'Perro',
          rasgos_fisicos: 'Peludo',
          tipo_alimento: 'Croquetas',
          recomendaciones: 'Paseos diarios',
        },
        {
          name: 'Mascota 2',
          edad: 2,
          tipo_mascota: 'Gato',
          rasgos_fisicos: 'Pelaje largo',
          tipo_alimento: 'Comida húmeda',
          recomendaciones: 'Juguetes interactivos',
        },

      ],
      headers: [
        {
          text: 'Nombre Mascota',
          align: 'start',
          sortable: false,
          value: 'name',
        },
        { text: 'Edad', align: 'end', value: 'edad' },
        { text: 'Tipo de Mascota', align: 'end', value: 'tipo_mascota' },
        { text: 'Rasgos Físicos', align: 'end', value: 'rasgos_fisicos' },
        { text: 'Tipo de Alimento', align: 'end', value: 'tipo_alimento' },
        { text: 'Recomendaciones', align: 'end', value: 'recomendaciones' },
      ],
    };
  },
};
</script>

<style>

</style>
