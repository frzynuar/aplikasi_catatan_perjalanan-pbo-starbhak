<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>TAMBAH CATATAN</h4>
                        <hr>

                        <form @submit.prevent="store">
                            <div class="form-group">
                                <label for="nik" class="font-weight-bold">NIK</label>
                                <input type="number" class="form-control" v-model="catatan.nik" placeholder="Masukkan NIK">
                                <!-- validation -->
                                <div v-if="validation.nik" class="mt-2 alert alert-danger">
                                    {{ validation.nik[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap" class="font-weight-bold">NAMA LENGKAP</label>
                                <input type="text" class="form-control" v-model="catatan.nama_lengkap" placeholder="Masukkan Nama Lengkap">
                                <!-- validation -->
                                <div v-if="validation.nama_lengkap" class="mt-2 alert alert-danger">
                                    {{ validation.nama_lengkap[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal" class="font-weight-bold">TANGGAL</label>
                                <input type="date" class="form-control" v-model="catatan.tanggal" placeholder="Masukkan Tanggal">
                                <!-- validation -->
                                <div v-if="validation.tanggal" class="mt-2 alert alert-danger">
                                    {{ validation.tanggal[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="waktu" class="font-weight-bold">WAKTU</label>
                                <input type="time" class="form-control" v-model="catatan.waktu" placeholder="Masukkan Waktu">
                                <!-- validation -->
                                <div v-if="validation.waktu" class="mt-2 alert alert-danger">
                                    {{ validation.waktu[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lokasi" class="font-weight-bold">LOKASI</label>
                                <input type="text" class="form-control" v-model="catatan.lokasi" placeholder="Masukkan Lokasi">
                                <!-- validation -->
                                <div v-if="validation.lokasi" class="mt-2 alert alert-danger">
                                    {{ validation.lokasi[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="suhu" class="font-weight-bold">SUHU</label>
                                <input type="text" class="form-control" v-model="catatan.suhu" placeholder="Masukkan Suhu">
                                <!-- validation -->
                                <div v-if="validation.suhu" class="mt-2 alert alert-danger">
                                    {{ validation.suhu[0] }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </form>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

export default {

    setup() {

        //state posts
        const catatan = reactive({
            nik: '',
            nama_lengkap: '',
            tanggal: '',
            waktu: '',
            lokasi: '',
            suhu: '',
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //method store
        function store() {

            let nik   = catatan.nik
            let nama_lengkap = catatan.nama_lengkap
            let tanggal   = catatan.tanggal
            let waktu = catatan.waktu
            let lokasi   = catatan.lokasi
            let suhu = catatan.suhu

            axios.post('http://localhost:8000/api/catatan', {
                nik: nik,
                nama_lengkap: nama_lengkap,
                tanggal: tanggal,
                waktu: waktu,
                lokasi: lokasi,
                suhu: suhu
            }).then(() => {

                //redirect ke post index
                router.push({
                    name: 'catatan.index'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            catatan,
            validation,
            router,
            store
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>