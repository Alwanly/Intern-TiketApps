<template>
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Daftar Packet Umroh</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" >Paket Umroh</h3>

                    <div class="card-tools">
                        <a class="btn btn-success btn-md text-white">Create Packet <i class="fas fa-plus-circle"></i> </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 500px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Acion</th>
                        </tr>
                        </thead>
                        <tbody >
                        <tr v-for="packet in packets">
                            <th>{{packet.id}}</th>
                            <th>{{packet.title}}</th>
                            <th>{{packet.date}}</th>
                            <th>{{packet.status}}</th>
                            <th><router-link to="/packet/detail" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </router-link></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>

<script>
    export default {
        name:'datas',
        data(){
            return{
                packets:[{
                    id:'1',
                    title:'Packet Umroh Murah',
                    date:"2020",
                    status:"Active"
                    },
                    {
                        id:'2',
                        title:'Packet Umroh VIP',
                        date:"2021",
                        status:"Active"
                    },
                    {
                        id:'3',
                        title:'Packet Umroh Spesial',
                        date:"2021",
                        status:"Active"
                    }]
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
