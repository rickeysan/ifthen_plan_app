import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { LeftCard } from './LeftCard';

export const LeftCardContainer = () => {
    console.log('LeftCardContainerです');
    const [cards,setCards] = useState([]);

    useEffect(() =>{
        getCards()
    },[])

    const getCards = async () => {
        console.log('getCardsメソッドです');
        const response = await axios.get('/leftcard');
        console.log(response.data);
        console.log(response.data.leftcards);
        console.log(response.data.leftcards[0].id);
        console.log(response.data.leftcards[1].id);
        console.log(response.data.leftcards[2].id);
        // const leftcards = response.data.leftcards;
        setCards(response.data.leftcards);
    }

    return (
        <>
        <h2>LeftCardCotainerです</h2>
        <ul>
            {/* <LeftCard sample={cards} /> */}
            {cards.map((card,index) =>
                <LeftCard key={index} sample={card.body} />
                // <li key={card.id}>{card.body}</li>
            )}
        </ul>
        </>
    )


}
