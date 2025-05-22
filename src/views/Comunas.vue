<template>
    <div class="container">
        <h1 class="text-start">Listado comuna |
            <button @click="newComuna()"
            class="btn btn-success mx-2">
            <font-awesome-icon icon="plus" />
        </button>
        </h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Municipality</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(comuna,index) in comunas":key="index">
                    <th scope="row">{{ index+1 }}</th>
                    <td>{{ comuna.comu_codi}}</td>
                    <td>{{ comuna.comu_nomb }}</td>
                    <td>{{ comuna.comu_nomb }}</td>
                    <td>
                        <button @click="editComuna(comuna.comu_codi)"
                        class="btn btn-danger mx-2">
                            <font-awesome-icon icon="trash" />
                        </button>
                        <button @click="deleteComuna(comuna.comu_codi)"
                        class="btn btn-warning mx-2">
                            <font-awesome-icon icon="pencil" />
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'
    import swal from 'sweetalert2'

    export default {

        name: 'Comuna',
        data(){
            return {
                comunas: []
            }
        },
        methods: {
            deleteComuna(codigo){
                swal.fire({
                    title: 'Do you want to delete the comuna with id ${codigo}?',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('http://localhost:8000/api/comunas/${codigo}')
                        .then(response => {
                            if (response.data.success) {
                                swal.fire('Deleted!! ', '', 'success')
                                this.comunas = response.data.comunas
                            }
                           
                        })
                    }
                })
        },

            editComuna(id){
                this.$router.push({name: 'EditComuna', params: {id: '${id}'} })
            },
            newComuna(){
                this.$router.push({name: 'newComuna'})
            }
        },
        mounted(){
            axios
            .get('http://127.0.0.1:8000/api/comunas')
            .then(response => {this.comunas = response.data.comunas.data})
        },
    }
</script>
<style scoped>
    .container{
        margin-top: 20px;
    }
</style>