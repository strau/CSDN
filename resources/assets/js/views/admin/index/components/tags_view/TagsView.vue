<template>
    <div>
        <!--<div style="margin-bottom: 20px;">-->
            <!--<el-button-->
                    <!--size="small"-->
                    <!--@click="addTab({name:'newTab',title:'新增页面',content:'这里是新增页面'})"-->
            <!--&gt;-->
                <!--add tab-->
            <!--</el-button>-->
        <!--</div>-->
        <el-tabs v-model="editableTabsValue" type="card" closable @tab-remove="removeTab" @tab-click="changeTab">
            <el-tab-pane
                    v-for="(item, index) in editableTabs"
                    :key="item.name"
                    :label="item.title"
                    :name="item.name"
                    :route="item.route"
                    :query="item.query"
            >
                <!--{{item.content}}-->
            </el-tab-pane>
        </el-tabs>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                //
            }
        },
        computed: {
            editableTabsValue : {    // 当前编辑的tab的名称
                get () {
                    return this.$store.state.layout.tabs.activeTabName;
                },
                set() {
                    //
                }
            },
            editableTabs : {    // tab栏显示的所有tab集合
                get () {
                    return this.$store.state.layout.tabs.editableTabs;
                },
                set () {
                    //
                },
            },
        },
        methods: {
            removeTab(targetName) {
                this.$store.commit('removeTab', {'targetName' : targetName, 'vue': this});
            },
            changeTab (tab) {
                this.$store.commit('updateActiveTabName', tab);
                if (this.getUri() !== tab.$attrs.route) {
                    this.$router.push({
                        path: tab.$attrs.route,
                        query: tab.$attrs.query
                    });
                }
            },
            getUri () {
                let url = location.href;
                // 去掉参数
                if(url.indexOf("?") !== -1){
                    url = url.split("?")[0];
                }
                // 协议
                let protocol = location.protocol + "//";
                // 域名
                let domain = location.host;
                // 去掉协议和域名
                return url.replace(protocol + domain, "");
            }
        },
    }
</script>