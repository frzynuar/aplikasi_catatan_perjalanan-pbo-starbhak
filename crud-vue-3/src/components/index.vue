<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>DATA CATATAN</h4>
                        <hr>
                        <router-link :to="{name: 'catatan.create'}" class="btn btn-md btn-success">TAMBAH CATATAN</router-link>

                        <table class="table table-striped table-bordered mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">NIK</th>
                                    <th scope="col">NAMA LENGKAP</th>
                                    <th scope="col">TANGGAL</th>
                                    <th scope="col">WAKTU</th>
                                    <th scope="col">LOKASI</th>
                                    <th scope="col">SUHU</th>
                                    <th scope="col">OPTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(catatan, index) in catatan" :key="index">
                                    <td>{{ catatan.nik }}</td>
                                    <td>{{ catatan.nama_lengkap }}</td>
                                    <td>{{ catatan.tanggal }}</td>
                                    <td>{{ catatan.waktu }}</td>
                                    <td>{{ catatan.lokasi }}</td>
                                    <td>{{ catatan.suhu }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'catatan.edit', params:{id: catatan.id }}" class="btn btn-sm btn-primary mr-1">EDIT</router-link>
                                        <button @click.prevent="catatanDelete(catatan.id)" class="btn btn-sm btn-danger ml-1">DELETE</button>                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { onMounted, ref } from 'vue'

export default {

    setup() {

        //reactive state
        let catatan = ref([])

        //mounted
        onMounted(() => {

            //get API from Laravel Backend
            axios.get('http://localhost:8000/api/catatan')
            .then(response => {
              
              //assign state posts with response data
              catatan.value = response.data.data

            }).catch(error => {
                console.log(error.response.data)
            })

        })

        //method delete
function catatanDelete(id) {
            
   //delete data post by ID
   axios.delete(`http://localhost:8000/api/catatan/${id}`)
   .then(() => {
              
       //splice posts 
       catatan.value.splice(catatan.value.indexOf(id), 1);

    }).catch(error => {
        console.log(error.response.data)
    })

}

        //return
        return {
            catatan,
            catatanDelete
        }

    }

}
</script>

<style>
    
</style>