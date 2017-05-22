<template>
    <div>
        <div class="alert alert-danger" v-if="errors.length > 0">
            <ul>
                <li v-for="err in errors">{{ err }}</li>
            </ul>
        </div>

        <div class="form-group">
            <label class="control-label" for="responsible_id">{{ responsible }}</label>
            <select class="form-control" id="responsible_id" name="responsible_id" v-model="responsible_id">
                <option v-for="(responsible, id) in responsibles" :value="id">{{ responsible }}</option>
            </select>
        </div>

        <hr>

        <div class="form-group">
            <button type="button" class="btn btn-sm btn-info" @click="addProduct">
                Add Product <i class="fa fa-plus"></i>
            </button>

            <br><br>
            
            <div class="row" v-for="(selectedProduct, index) in selectedProducts">
                <div class="col-xs-12">
                    <div class="form-inline">
                        <legend>
                            Product #{{ index+1 }}
                        </legend>

                        <div class="form-group">
                            <label :for="'products' + index">Select Product</label>
                            <select class="form-control" :id="'products' + index" v-model="selectedProduct.productId">
                                <option v-for="(product, id) in allProducts" :value="id">{{ product }}</option>
                            </select>
                        </div>

                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <div class="form-group">
                            <label :for="'quantity' + index">Quantity</label>
                            <input
                                type="number"
                                :id="'quantity' + index"
                                class="form-control"
                                placeholder="quantity"
                                name="quantity"
                                v-model="selectedProduct.quantity">
                        </div>

                        <button
                            type="button"
                            class="btn btn-danger"
                            @click="removeSelectedProduct(index)"
                            :disabled="selectedProducts.length === 1">
                            <i class="fa fa-trash"></i>
                        </button>

                    </div>
                    <br>
                </div>
            </div>
        </div>

        <button @click="createOrder" class="btn btn-primary btn-block">
            Save <i class="fa fa-check"></i>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['responsibles', 'type', 'products', 'createOrderUrl', 'redirectTo'],

        data() {
            return  {
                responsible_id: null,
                allProducts: this.products,
                selectedProducts: [{
                    productId: null,
                    quantity: null
                }],
                errors: []
            }
        },

        computed: {
            responsible() {
                return this.type === 'selling' ? 'Customer' : 'Agent';
            }
        },

        methods: {
            addProduct() {
                this.selectedProducts.push({
                    productId: null,
                    quantity: null
                });
            },

            removeSelectedProduct(indx) {
                this.selectedProducts.splice(indx, 1);
            },

            createOrder() {
                this.validateRequest();

                if(this.errors.length > 0) {
                    return;
                }

                axios.post(this.createOrderUrl, {
                    type: this.type,
                    responsible_id: this.responsible_id,
                    selected_products: this.selectedProducts
                })
                .then(res => {
                    swal({
                        title: 'Success',
                        text: 'Order created successfully',
                        type: 'success'
                    }, () => window.location = this.redirectTo);
                })
                .catch(e => {
                    this.errors = [];

                     Object.keys(e.response.data).map(key => {
                        e.response.data[key].map(err => {
                            this.errors.push(err);
                        });
                    });
                })

                console.info('saving', this.selectedProducts, this.responsible_id);
            },

            validateRequest() {
                this.errors = [];

                let validProducts = {};

                if(! this.responsible_id) { this.errors.push(`${this.responsible} is not valid.`); }

                if(this.selectedProducts.length === 0) { this.errors.push(`You must add at least one product.`); }

                this.selectedProducts.map((product, i) => {
                    if(! product.productId || ! product.quantity || parseInt(product.quantity) <= 0) {
                        this.errors.push(`Product ${i+1} is invalid.`);
                    } else if (validProducts[product.productId]) {
                        this.errors.push(`Product ${i+1} already added.`);
                    } else {
                        validProducts[product.productId] = true;
                    }
                });

            }
        }
    }
</script>
