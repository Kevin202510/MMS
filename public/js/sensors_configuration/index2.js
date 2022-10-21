import fetch from "../modules/fetch.js";
/**
 *-----------------------------------------------
 * @param Model entity.name
 * @param Attributes entity.attribute(show on table)
 * @param Button attribute.actions.key
 * @param btn_attribute key:['icon','tooltip','color']
 * @param Base_URL entiry.url
 * @return GUI BREAD
 */
/**
 * JQuery DOM EventListener
 * Note : Update if necessary only
 */

$("body").on("click", ".btn-view", async (e) =>
    state.view($(e.currentTarget).data("index"))
);

$("body").on("click", ".btn-recover", async (e) =>
    state.recover($(e.currentTarget).data("index"))
);

const state = {
    /* [Table] */
    entity: {
        name: "history",
        attributes: ["configuration_name", "datetimeval"],
        actions: {
            recover: ["fas fa-undo-alt", "recover", "success"],
            view: ["fa fa-eye", "View", "info"],
        },
        baseUrl: "api",
    },
    /* [Object Mapping] */
    models: [],
    /* [Tag object] */
    // btnKey: document.getElementById("key"),
    // btnLook: document.getElementById("look"),
    btnNew: document.getElementById("btn-new"),
    Userid: document.getElementById("id"),
    btnEngrave: document.getElementById("engrave"),
    activeIndex: 0,
    btnUpdate: null,
    btnDelete: null,
    /* [initialized] */
    init: () => {
        state.ask();
    },
    /* [ACTIONS] */
    ask: async () => {
        state.models = await fetch.translate(state.entity);
        console.log(state.models);
        if (state.models) {
            state.models.forEach((model) => fetch.writer(state.entity, model));
        }
    },
    view: (i) => {
        state.activeIndex = i;
        state.btnEngrave.innerHTML = "Close";

        state.btnEngrave.removeEventListener("click", state.store);
        state.btnEngrave.addEventListener("click", state.closethis);
        fetch.viewOnModal(state.models[i]);
    },
    closethis: async(e)=>{
        $("#modal-main").modal("hide");
    },
    recover: async (i) => {
        let pkey = state.models[i].id;
        let ans = await fetch.recover(state.entity, pkey);
        if (ans) {
            state.models.splice(i, 1);
        }
    },
};

window.addEventListener("load", state.init);