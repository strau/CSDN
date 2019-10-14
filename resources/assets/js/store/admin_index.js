/**
 * 管理前端状态
 */
import Vue from 'vue'
import Vuex from 'vuex'
// 引入前端路由文件

Vue.use(Vuex);

export default new Vuex.Store({
    state : {
        layout : {    // 主布局数据
            menu : {
                isCollapse: false,
                menus: [
                    {
                        id:1,
                        name:'菜单一',
                        route:'',
                        child: [
                            {
                                id:2,
                                name:'子菜单1',
                                route:'/admin',
                                query:{}
                            },
                            {
                                id:3,
                                name:'子菜单2',
                                route:'/admin/main',
                                query:{}
                            },
                            {
                                id:4,
                                name:'子菜单2',
                                route:'/admin/main',
                                query:{}
                            },
                        ]
                    }
                ]
            },
            navbar : {
                user: {id:1, name:'管理员'}
            },
            tabs : {
                activeTabName:'index',
                editableTabs:[
                    {
                        title: '首页',
                        name: 'index',
                        route: '/admin/index',
                        content: '首页'
                    },
                ]
            }
        }
    },
    mutations : {
        // 将侧边栏的菜单添加到导航栏
        addTab (state, tab) {
            let repeat = false;
            // 如果tab已经存在，不再重复添加（tab.name是唯一的）
            state.layout.tabs.editableTabs.forEach((t, index) => {
                if (t.name === tab.name) {
                    repeat = true;
                }
            });

            if (!repeat) {
                // 添加一个tab
                state.layout.tabs.editableTabs.push(tab);
            }
            //将新添加的tab设置当前正在编辑的tab
            state.layout.tabs.activeTabName = tab.name;
        },
        // 修改当前正在编辑的tab的名称
        updateActiveTabName (state, tab) {
            state.layout.tabs.activeTabName = tab.name;
        },
        // 从导航栏中移除指定的侧边栏菜单
        removeTab (state, targetNameAndVueObject) {
            let url = false;
            let query = {};
            if (state.layout.tabs.activeTabName === targetNameAndVueObject.targetName) {
                // 修改当前正在编辑的tab的名称
                state.layout.tabs.editableTabs.forEach((tab, index) => {
                    if (tab.name === targetNameAndVueObject.targetName) {
                        let nextTab = state.layout.tabs.editableTabs[index + 1] || state.layout.tabs.editableTabs[index - 1];
                        if (nextTab) {
                            state.layout.tabs.activeTabName = nextTab.name;
                            url = nextTab.route === tab.route? false: nextTab.route;
                            query = nextTab.query;
                        }
                    }
                });
            }

            // 删除tabs中名称和传入要删除的tab名称相同的tab
            state.layout.tabs.editableTabs = state.layout.tabs.editableTabs.filter(tab => tab.name !== targetNameAndVueObject.targetName);
            // 如果删除的是当前正在编辑的tab(url不为false)，跳转到新的正在编辑的tab对应的链接
            if (url) {
                targetNameAndVueObject.vue.$router.push({
                    path: url,
                    query: query
                });
            }
        },
        // 打开或关闭侧边栏
        collapse (state) {
            state.layout.menu.isCollapse = ! state.layout.menu.isCollapse;
        },
        // 更新侧边栏菜单和当前登录的用户数据
        updateLayoutMenusAndUser (state, menusAndUser) {
            menusAndUser.menus && (state.layout.menu.menus = menusAndUser.menus);
            menusAndUser.user && (state.layout.navbar.user = menusAndUser.user);
        },
    }
})