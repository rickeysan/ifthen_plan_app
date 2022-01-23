import React, { useEffect, useState } from 'react';
import axios from 'axios';

export const LeftCard = (props) => {


    return (
        <>
            <h3>LeftCardです</h3>
            <p>{props.sample}</p>
        </>
    )
}
