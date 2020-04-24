<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
    <div id="databinding" style="">
        <br>
        <br>
        <h3 text-align="center">Currency Convertor </h3>
        <span>Amount:</span><input type="number" v-model.number="amount" placeholder="Amount" /><br /><br />
        <span>Convert From:</span>
        <select v-model="convertfrom">
            <option v-for="(a, index) in currencyfrom" v-bind:value="a.name">{{a.desc}}</option>
        </select>
        <span>Convert :</span>
        <select v-model="convertto">
            <option v-for="(a, index) in currencyfrom" v-bind:value="a.name">{{a.desc}}</option>
        </select><br /><br />
        <span> {{amount}} {{convertfrom}} equals {{finalamount}} {{convertto}}</span>
    </div>
    <script>
    new Vue({
        el: '#databinding',
        data: {
            name: '',
            currencyfrom: [{
                    name: "USD",
                    desc: "US Dollar"
                },
                {
                    name: "EUR",
                    desc: "Euro"
                },
                {
                    name: "INR",
                    desc: "Indian Rupee"
                },

            ],
            convertfrom: "INR",
            convertto: "USD",
            amount: ""
        },
        computed: {
            finalamount: function() {
                var to = this.convertto;
                var from = this.convertfrom;
                var final;
                switch (from) {
                    case "INR":
                        if (to == "USD") {
                            final = this.amount * 0.016;
                        }
                        if (to == "EUR") {
                            final = this.amount * 0.013;
                        }
                        if (to == "INR") {
                            final = this.amount;
                        }

                        break;
                    case "USD":
                        if (to == "INR") {
                            final = this.amount * 63.88;
                        }
                        if (to == "EUR") {
                            final = this.amount * 0.84;
                        }
                        if (to == "USD") {
                            final = this.amount;
                        }

                        break;
                    case "EUR":
                        if (to == "INR") {
                            final = this.amount * 76.22;
                        }
                        if (to == "USD") {
                            final = this.amount * 1.19;
                        }
                        if (to == "EUR") {
                            final = this.amount;
                        }

                        break;

                }
                return final;
            }
        }
    });
    </script>
</head>

</html>