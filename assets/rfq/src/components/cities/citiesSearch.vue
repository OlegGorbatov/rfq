<template>
    <div id="cities-search">

        <loading
            loader="spinner"
            :width="80"
            :height="80"
            color="#333"
            :active.sync="loading"
        ></loading>

        <div class="row">
            <div class="col-md-2">
                <input class="form-control" @keyup="fetchItems" v-model="filter.values.name" type="text" autocomplete="false" placeholder="city" />
            </div>
            <div class="col-md-2">
                <city-form ref="cityForm" @send="fetchItems"></city-form>
            </div>
        </div>
        <br/>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Code</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Group</th>
                    <th class="text-center">RZD-Code</th>
                    <th class="text-center">Accessible in Quotation</th>
                    <th class="text-left">Accessible in Quotation for Clients</th>
                    <th class="text-center">Available for MICE</th>
                </tr>
                </thead>
                <tbody>

                <template v-for="item in items">
                    <tr @click="showModal(item)" class="city-item">
                        <td class="text-center">{{ item.code }}</td>
                        <td class="text-center">{{ item.name }}</td>
                        <td class="text-center">{{ item.group }}</td>
                        <td class="text-center">{{ item.rzdCode }}</td>
                        <td class="text-center">{{ item.quotationAccessible ? 'Yes' : 'No' }}</td>
                        <td class="text-left">{{ item.quotationAccessibleForClients ? 'Yes' : 'No' }}</td>
                        <td class="text-center">{{ item.mice ? 'Yes' : 'No'}}</td>
                    </tr>
                </template>

                <tr v-if="0 === items.length">
                    <td colspan="9" class="text-muted text-center">{{ false === forbidden ? 'Empty' : 'Data not available' }}</td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import CityForm from './cityForm';

    export default {
        name: "citiesSearch",
        components: {
            Loading,
            CityForm
        },
        data: function () {
            return {
                url: '/api/cities/search',
                loading: false,
                forbidden: false,
                items: [],
                filter: {
                    values: {
                        name: null
                    }
                }
            };
        },
        mounted: function () {
            this.fetchItems();
        },
        methods: {
            fetchItems: function () {
                let params = this.filter.values;
                this.loading = true;

                this.axios.get(this.url, {params: params}).then((response) => {
                    this.items = response.data.items;
                }).finally(() => {
                    this.loading = false;
                });
            },
            showModal: function(item) {
                this.$refs.cityForm.form = {
                    name: item.name,
                    code: item.code,
                    group: item.group,
                    rzdCode: item.rzdCode,
                    quotationAccessible: item.quotationAccessible,
                    quotationAccessibleForClients: item.quotationAccessibleForClients,
                    mice: item.mice,
                    id: item.id,
                };

                this.$refs.cityForm.showModal();
            }
        }
    }
</script>
<style scoped>
    .city-item {
        cursor: pointer;
    }
    .city-item:hover {
        background-color: #f1f1f1;
    }
</style>