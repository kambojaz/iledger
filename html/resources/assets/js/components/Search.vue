<template>
    <div class="">

        <h1 class="subtitle">Поиск страховых случаев клиента</h1>


       <div class="columns">
            <div class="column is-6">

                <b-field>
                    <b-input placeholder="Имя Фамилия клиента" type="search" icon="search" v-model="query"></b-input>
                    <p class="control">
                        <button class="button is-info" @click="searchCases">Найти</button>
                    </p>
                </b-field>

            </div>
       </div>

       <hr/>

       <section class="section_table" v-if="compiledData.length > 0">

                <b-field grouped group-multiline>
                    <div class="control is-flex">
                        <b-switch v-model="finishedOnly">Только выплаченные</b-switch>
                    </div>
                </b-field>

                <b-table
                    :data="compiledData"
                    :paginated="false"
                    default-sort="date"
                    :loading="is_loading"
                    >

                    <template slot-scope="props">
                        
                        <b-table-column field="id" label="ID" width="40" sortable numeric>
                            {{ props.row.id }}
                        </b-table-column>

                        <b-table-column field="user.first_name" label="Имя" sortable>
                            {{ props.row.person.first_name }}
                        </b-table-column>

                        <b-table-column field="user.last_name" label="Фамилия" sortable>
                            {{ props.row.person.last_name }}
                        </b-table-column>

                        <b-table-column field="date" label="Дата" sortable centered>
                                {{ new Date(props.row.date).toLocaleDateString() }}
                        </b-table-column>

                        <b-table-column label="Страховая компания">
                            {{ props.row.company }}
                        </b-table-column>

                        <b-table-column label="Сумма выплаты">
                            {{ props.row.summ }} <i class="fa fa-rub"></i>
                        </b-table-column>

                        <b-table-column label="Выплата">
                            <b-icon v-if="props.row.is_paid" pack="fa" size="small"
                                :icon="props.row.is_paid ? 'check' : ''">
                            </b-icon>

                            <button v-else class="button is-info is-small" @click="createPayment(props.row.id)">Выплатить</button>

                        </b-table-column>

                    </template>

                </b-table>

            </section>

    </div>
</template>

<script>

    

    export default {
        data() {
            return {

                finishedOnly: false,
                is_loading: false,

                tableData: [],

                tableDataTest: [
                    {
                        id: '1',
                        person: {
                            first_name: 'Alex',
                            last_name: 'Petrov'
                        },
                        date: '2017-08-01',
                        summ: 100000,
                        company: 'Reso',
                        is_paid: true
                    },
                    {
                        id: '2',
                        person: {
                            first_name: 'Ivan',
                            last_name: 'Petrov'
                        },
                        date: '2017-09-12',
                        summ: 30000,
                        company: 'Согласие',
                        is_paid: false
                    }
                ],


                query: null
            }
        },
        computed: {

            compiledData() {

                return _.filter(this.tableData, (o)=>{

                    if(this.finishedOnly) {
                        return o.is_paid;
                    }
                    else {
                        return true;
                    }
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {

            searchCases() {
                
                this.is_loading = true;


                try {

                    axios.post('http://localhost:3000/queries/get_case_query', {surname: this.query}, {})
                      .then((response)=> {

                            console.log('searchCases() response', response.data);

                            this.is_loading = false;

                            
                            while(this.tableData.length) {
                                this.tableData.pop();
                            }

                            _.forEach(response.data, (o)=>{
                               this.tableData.push(o); 
                            });


                        })
                        .catch((data, status, request)=> {

                            this.is_loading = false;
                           
                            while(this.tableData.length) {
                                this.tableData.pop();
                            }

                            _.forEach(this.tableDataTest, (o)=>{
                               this.tableData.push(o); 
                            });


                        })
                    ;

                } catch(e) {

                    
                }
            },

            createPayment(_id) {
                
                this.is_loading = true;


                var data = {
                    "$class": "org.acme.ildeger.close_case",
                    "real_case": "resource:org.acme.iledger.Case#" + _id
                };


                axios.post('http://localhost:3000/transactions', data, {})
                  .then((response)=> {

                        console.log('searchCases() response', response.data);

                        this.is_loading = false;

                        
                         while(this.tableData.length) {
                            this.tableData.pop();
                        }

                        _.forEach(response.data, (o)=>{
                           this.tableData.push(o); 
                        });


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