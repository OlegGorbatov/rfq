<template>
    <div>
        <button class="btn btn-secondary" @click="showModal">Create New City</button>
        <b-modal ref="modal" v-model="modal" size="lg">
            <Loading :loading="loading"/>

            <div class="error-block">
                <template v-for="error in errors">
                    <p>{{ error.message }}</p>
                </template>
            </div>
            <div class="form-group">
                <label for="input-code">Code:</label>
                <input id="input-code" class="form-control" type="text" name="code" v-model="form.code">
            </div>

            <div class="form-group">
                <label for="input-name">Name:</label>
                <input id="input-name" class="form-control" type="text" name="name" v-model="form.name">
            </div>

            <div class="form-group">
                <label for="input-group">Group:</label>
                <select v-model="form.group" id="input-group" name="group">
                    <option value="Default">Default</option>
                    <option value="Golden Ring">Golden Ring</option>
                    <option value="Transsib">Transsib</option>
                    <option value="Technical">Technical</option>
                    <option value="Two Capitals">Two Capitals</option>
                    <option value="Baltic States">Baltic States</option>
                    <option value="Baikal">Baikal</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="form-group">
                <label for="input-rzdCode">RZD-Code:</label>
                <input id="input-rzdCode" class="form-control" type="text" name="rzdCode" v-model="form.rzdCode">
            </div>

            <div class="form-group">
                <label for="input-quotationAccessible">
                <input id="input-quotationAccessible"  type="checkbox" name="quotationAccessible" v-model="form.quotationAccessible">
                Accessible in Quotation:</label>
            </div>

            <div class="form-group">
                <label for="input-quotationAccessibleForClients">
                <input id="input-quotationAccessibleForClients"  type="checkbox" name="quotationAccessibleForClients" v-model="form.quotationAccessibleForClients">
                Accessible in Quotation for Clients:</label>
            </div>

            <div class="form-group">
                <label for="input-mice">
                <input id="input-mice" type="checkbox" name="mice" v-model="form.mice">
                Available for MICE:</label>
            </div>

            <template v-slot:modal-footer>
                <div class="col text-right">
                    <button type="button" class="btn btn-primary" @click="submit()">OK</button>
                    <button type="button" class="btn btn-outline-dark" @click="hideModal">Cancel</button>
                </div>
            </template>
        </b-modal>
    </div>
</template>

<script>
    import Loading from "../Loading";
    import Csrf from "../../services/csrf";

    export default {
        name: "cityForm",
        components: {Loading},
        data: function () {
            return {
                errors: null,
                loading: false,
                modal: false,
                form: {
                    code: null,
                    name: null,
                    group: null,
                    rzdCode: null,
                    quotationAccessible: null,
                    quotationAccessibleForClients: null,
                    mice: null,
                    id:null
                },
                api: {
                    create: '/api/cities/create',
                    update: '/api/cities/update',
                }
            }
        },
        watch: {
            modal: function() {
                if (false !== this.modal) {
                    return;
                }

                this.form = {
                    code: null,
                    name: null,
                    group: null,
                    rzdCode: null,
                    quotationAccessible: null,
                    quotationAccessibleForClients: null,
                    mice: null,
                    id:null
                }
            },
        },
        methods: {

            submit: function() {
                this.loading = true;
                this.errors = null;

                const form = new FormData;

                form.append('code', this.form.code);
                form.append('name', this.form.name);
                form.append('group', this.form.group);
                form.append('rzdCode', this.form.rzdCode);
                form.append('quotationAccessible', this.form.quotationAccessible);
                form.append('quotationAccessibleForClients', this.form.quotationAccessibleForClients);
                form.append('mice', this.form.mice);
                form.append(Csrf.name(), Csrf.value());

                this.axios.post(this.getUrl(), form).then(response => {
                    this.$emit('send');
                    this.hideModal();
                }).catch(err => {
                    this.errors = err.response.data;
                }).finally(_ => {
                    this.loading = false;
                });
            },

            getUrl: function() {
                let url = this.api.create;

                if (null !== this.form.id) {
                    url = this.api.update + '/' + this.form.id
                }

                return url;
            },

            showModal: function() {
                this.modal = true;
            },

            hideModal: function() {
                this.modal = false;
            }
        }
    }
</script>

<style scoped>
    .error-block {
        color: red;
    }
</style>