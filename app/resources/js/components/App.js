import React from 'react';
import ReactDOM from 'react-dom';
import { Habit } from './Habit';

export const App = () => {
    return <Habit />
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
