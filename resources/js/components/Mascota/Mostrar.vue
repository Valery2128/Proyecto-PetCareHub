<template>
  <div>
    <h1 class="text-center">Gestionar Mascotas</h1>

    <!-- <button type="button" class="btn btn-success" @click="openModal">
     Agregar
    </button> -->
    <!-- <v-btn
      color="primary"
      dark
      @click.stop="openModal()"
    >
    Agregar
    </v-btn>
    <v-dialog
      v-model="dialogCrear"
      scrollable
      max-width="300px"
    >
    <crear-component @mascotaAgregada="listar" />
  </v-dialog> 
    <v-data-table
      :headers="headers"
      :items="mascotas"
      class="elevation-1"
      item-key="id"
    >
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editarMascota(item)">mdi-pencil</v-icon>
        <v-icon small @click="confirmarEliminacion(item.id)">mdi-delete</v-icon>
      </template>

      <template>
        <tr v-for="m in mascotas" :key="m.id">
          <td>{{ m.nombre }}</td>
          <td>{{ m.edad }}</td>
          <td>{{ m.tipo_mascota }}</td>
          <td>{{ m.rasgos_fisicos }}</td>
          <td>{{ m.tipo_alimento }}</td>
          <td>{{ m.recomendaciones_cuidado }}</td>
        </tr>
      </template>
    </v-data-table>-->

    <v-data-table :headers="headers" :items="mascotas" class="elevation-1">
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>My CRUD</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                New Item
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">{{ formTitle }}</span>
              </v-card-title>

              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.nombre" label="nombre"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.rasgos_fisicos" label="rasgos_fisicos"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.recomendaciones_cuidado"
                        label="recomendaciones_cuidado"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.tipo_alimento" label="tipo_alimento"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.tipo_mascota" label="tipo_mascota"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.edad" label="edad" type="number"></v-text-field>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">
                  Cancel
                </v-btn>
                <v-btn color="blue darken-1" text @click="save">
                  Save
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card>
              <v-card-title class="text-h5">Are you sure you want to delete this item?</v-card-title>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)">
          mdi-pencil
        </v-icon>
        <v-icon small @click="deleteItem(item)">
          mdi-delete
        </v-icon>
      </template>
      <template v-slot:no-data>
        <v-btn color="primary" @click="listar">
          Reset
        </v-btn>
      </template>
    </v-data-table>
  </div>
</template>

<script>
import axios from 'axios';
import CrearComponent from './Crear.vue';
export default {
  components: {
    'crear-component': CrearComponent
  },
  data() {
    return {
      dialog: false,
      dialogDelete: false,
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
      ],

      editedIndex: -1,
      editedItem: {
        id: 0,
        edad: 0,
        nombre: "",
        rasgos_fisicos: "",
        recomendaciones_cuidado: "",
        tipo_alimento: "",
        tipo_mascota: "",
        user_id: 0,
      },
      defaultItem: {
        id: 0,
        edad: 0,
        nombre: "",
        rasgos_fisicos: "",
        recomendaciones_cuidado: "",
        tipo_alimento: "",
        tipo_mascota: "",
        user_id: 0,
      },
    };
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
  },
  watch: {
    dialog(val) {
      val || this.close()
    },
    dialogDelete(val) {
      val || this.closeDelete()
    },
  },
  mounted() {
    this.listar();
  },
  methods: {
    async listar() {
      const res = await axios.get('/mascotas');
      this.mascotas = res.data;
    },
    async eliminar(id) {
      const res = await axios.delete('/mascotas/' + id);
      this.listar();
    },
    confirmarEliminacion(id) {
      if (confirm('¿Estás seguro de eliminar esta mascota?')) {
        this.eliminar(id);
      }
    },
    editarMascota(item) {
      // Lógica para editar la mascota
    },
    // Resto de tus métodos

    editItem(item) {
      this.editedIndex = this.mascotas.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem(item) {
      this.editedIndex = this.mascotas.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },

    deleteItemConfirm() {
      axios.delete(`mascotas/${this.editedItem.id}`)
      .then(res => {
        this.$toast(res.data.msg);
        console.log(res)
        this.mascotas.splice(this.editedIndex, 1)
        this.closeDelete()
      })
      .catch(err => {
        this.$toast.error("ups, algo paso.");
        console.log(err); 
      })
    },

    close() {
      this.dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    closeDelete() {
      this.dialogDelete = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

    save() {
      if (this.editedIndex > -1) {
        //editar
        axios.put(`mascotas/${this.editedItem.id}`,this.editedItem)
        .then(res => {
          this.$toast(res.data.msg);
          console.log(this.editedItem)
          Object.assign(this.mascotas[this.editedIndex], this.editedItem)
          this.close() 
        })
        .catch(err => {
          this.$toast.error("ups, algo paso. (editar) ");
          console.log(err); 
        })

      } else {
        //crear
        axios.post('mascotas/',this.editedItem)
        .then(res => {
          this.$toast(res.data.msg);
          this.mascotas.push(this.editedItem) 
          this.close()
          console.log(res)
        })
        .catch(err => {
          this.$toast.error("ups, algo paso.");
          console.log(err); 
        })

      }
      
    },
  },

}
</script>

<style>

</style>
