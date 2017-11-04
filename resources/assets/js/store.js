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
                    .then(response => {
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
                    return sourceItemId == item.id;
                })[0]);
            } else {
                axios
                    .get(route('api.operation-sources.edit', {operation_source: sourceItemId}))
                    .then(response => {
                        resolve(response.data);
                    })
                    .catch(e => {
                        reject(e);
                    });
            }
        });
    },
    setSourceItem(item) {
        if (this.debug) console.log('set source item ' + item.id);

        return new Promise((resolve, reject) => {
            axios
                .put(route('api.operation-sources.update', {operation_source: item.id}), item)
                .then(response => {
                    resolve(response.data);
                })
                .catch(e => {
                    // console.log('e.response', e.response);
                    reject(e.response);
                });
        });
    }
}