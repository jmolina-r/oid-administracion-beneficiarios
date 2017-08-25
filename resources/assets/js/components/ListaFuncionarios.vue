<template>
<div class='row'>
    <div class='col-sm-12'>
        <div class='box bordered-box orange-border' style='margin-bottom:0;'>
            <div class='box-content box-no-padding'>
                <div class='responsive-table'>
                    <div class='scrollable-area'>
                        <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                            <thead>
                                <tr>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        Telefono
                                    </th>
                                    <th>
                                        Cargo
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="funcionario in funcionarios">
                                    <td class="capitalize">{{ funcionario.nombre }} {{ funcionario.apellido }}</td>
                                    <td>{{ funcionario.email }}</td>
                                    <td>{{ funcionario.telefono }}</td>
                                    <td class="capitalize">{{ funcionario.tipo_funcionario.nombre }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</template>

<script>
module.exports = {
    data: function() {

        // GET /someUrl
        this.$http.get('/funcionario').then(response => {

            // get body data
            this.funcionarios = response.body.data;

        }, response => {
            funcionarios = [];
        });

        return {
            funcionarios: []
        }
    }
}
</script>

<style lang="css">
</style>
