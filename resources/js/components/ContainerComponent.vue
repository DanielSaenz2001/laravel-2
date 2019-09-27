<template>
    <div class="container">
        <form-component @new="addClient"></form-component>
        <hr>
        <cliente-component v-for="(cliente, index) in clientes"
                         :key="cliente.id"
                         :cliente="cliente"
                         @update="updateClient(index, ...arguments)"
                         @delete="deleteClient(index)">
        </cliente-component>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cliente: []
            }
        },
        mounted() {
            this.listClient();
        },
        methods: {
           listClient() {
                axios.get('/cliente').then(response => {
                    this.cliente = response.data.data;
                });
           },
            addClient(cliente) {
                this.cliente = cliente.data;
            },
            updateClient(index, cliente) {
                this.cliente[index] = cliente;
            },
            deleteClient(index) {
                this.cliente.splice(index, 1);
            }
        }
    }
</script>
