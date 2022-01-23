import React, { useEffect, useState } from 'react';
import axios from 'axios';

export const Habit = () => {
    const [habits,setHabits] = useState([]);

    useEffect(() => {
        getHabits(),[]
    })

    const getHabits = async () => {
        const response = await axios.get('/habit');
        setHabits(response.data.habits);
    }

    return (
        <div>
            <h1>Habitページ</h1>
            <ul>
                {habits.map((habit)=>
                <li key={habit.id}>{habit.task}</li>
                )}
            </ul>
        </div>
    );
}

