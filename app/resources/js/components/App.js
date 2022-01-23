import React from 'react';
import ReactDOM from 'react-dom';
import { LeftCardContainer } from './LeftCardContainer';

export const App = () => {
    return <LeftCardContainer />
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
