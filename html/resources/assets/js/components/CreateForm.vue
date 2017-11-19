<template>
    <div class="">
       <div class="columns">
            <div class="column is-8">

                <h1 class="subtitle">{{ title }}</h1>

                <b-field v-for="field in fields">

                    <b-select v-if="field.type == 'select'" :placeholder="field.label" size="is-large">
                        <option
                            v-for="option in field.options"
                            :value="option.id"
                            :key="option.id">
                            {{ option.title }}
                        </option>
                    </b-select>

                    <b-input :placeholder="field.label" v-else type="text" v-model="formData[field.name]" :name="field.name" size="is-large"></b-input>

                </b-field>

                <hr/>

                <button class="button is-large is-info">{{ btn_title }}</button>


            </div>
       </div>
    </div>
</template>

<script>

    

    export default {
        props: {

            form: {
                type: String,
                default: 'client'
            }
        },
        data() {
            return {

                is_loading: false,

                forms: {
                    client: {
                        title: 'Создание клиента',
                        btn_title: 'Созать клиента',
                        url: '',
                        fields: [
                            {
                                name: 'name',
                                label: 'Имя'
                            },
                            {
                                name: 'surname',
                                label: 'Фамилия'
                            }
                        ]
                    },
                    case: {
                        title: 'Регистрация страхового случая',
                        btn_title: 'Зарегистрировать страховой случай',
                        url: '',
                        fields: [
                            {
                                name: 'name',
                                label: 'Имя'
                            },
                            {
                                name: 'surname',
                                label: 'Фамилия'
                            },
                            {
                                name: 'summ',
                                label: 'Сумма выплаты'
                            }
                        ]
                    },
                    contract: {
                        title: 'Регистрация договора страхования',
                        btn_title: 'Зарегистрировать договор',
                        url: '',
                        fields: [
                            {
                                name: 'name',
                                label: 'Имя'
                            },
                            {
                                name: 'surname',
                                label: 'Фамилия'
                            },
                            {
                                name: 'type',
                                label: 'Объект страхования',
                                type: 'select',
                                options: [
                                    {
                                        id: 'HOME',
                                        title: 'Жилище'
                                    },
                                    {
                                        id: 'CAR',
                                        title: 'Автомобиль'
                                    },
                                    {
                                        id: 'LIFE',
                                        title: 'Жизнь и здоровье'
                                    }

                                ]
                            },
                            {
                                name: 'max_summ',
                                label: 'Макс. сумма выплаты по договору'
                            }
                        ]
                    },
                },

                formData: {

                }

            }
        },
        computed: {


            fields() {

                return this.forms[this.form].fields;
            },

            title() {

                return this.forms[this.form].title;
            },

            btn_title() {

                return this.forms[this.form].btn_title;
            }
            
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {

            submitForm() {
                
                this.is_loading = true;

                axios.post('', {event: _data}, {})
                  .then((response)=> {

                        console.log('submitForm() response', response.data);

                        this.is_loading = false;

                      
                    })
                    .catch((data, status, request)=> {
                        var errors = data.data;
                        this.is_loading = false;
                        console.error(errors);
                    })
                ;
            }
        }
    }
</script>


<style>


    
    .section_table {
        position: relative;
    }

</style>