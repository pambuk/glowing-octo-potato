export default {
    debug: true,
    state: {
        sourceItems: []
    },
    setSourceItems(items) {
        if (this.debug === true) console.log('setting source items');
        this.state.sourceItems = items;
    },
    getSourceItems() {
        if (this.debug === true) console.log('returning source items');

        return new Promise((resolve, reject) => {
            if (this.state.sourceItems.length === 0) {
                axios
                    .get(route('api.operation-sources.index'))
                    .then((response) => {
                        this.state.sourceItems = response.data;
                        resolve(this.state.sourceItems);
                    });
            } else {
                resolve(this.state.sourceItems);
            }
        });
    },
    getSourceItem(sourceItemId) {
        if (this.debug === true) console.log('returning source item for id ' + sourceItemId);

        return new Promise((resolve, reject) => {
            if (this.state.sourceItems.length) {
                resolve(_.filter(this.state.sourceItems, (item) => {
// console.log('filter', item.id == sourceItemId, typeof item.id, typeof sourceItemId);
                    return sourceItemId == item.id;
                })[0]);
            }
        });
    }
}