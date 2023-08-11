import * as React from 'react';
import { useTheme } from '@mui/material/styles';
import Box from '@mui/material/Box';
import SwipeableViews from 'react-swipeable-views';
import { autoPlay } from 'react-swipeable-views-utils';
import "./carousel.css";


const AutoPlaySwipeableViews = autoPlay(SwipeableViews);

const images = [
    {
        imgPath:
            'https://media.topachat.com/media/s1000/649be289cb42ac1f062be67d.webp',
    },
    {
        imgPath:
            'https://media.topachat.com/media/s1000/64c77d9e642f572b251f3ddf.webp',
    },
    {
        imgPath:
            'https://media.ldlc.com/encart/p/21462_b.jpg',
    },
    {
        imgPath:
            'https://www.aorus.com/image/banner/GOELITE-1690280290.jpg',
    },
    {
        imgPath:
            'https://media.topachat.com/media/s1000/63639dcc3b1f41344e0c11a3.webp',
    },
];

function SwipeableTextMobileStepper() {
    const theme = useTheme();
    const [activeStep, setActiveStep] = React.useState(0);

    const handleStepChange = (step) => {
        setActiveStep(step);
    };

    return (
        <Box sx={{ maxWidth: 1000000000, flexGrow: 1 }}>
            <div className="conteneur">
        <AutoPlaySwipeableViews
          axis={theme.direction === 'rtl' ? 'x-reverse' : 'x'}
          index={activeStep}
          onChangeIndex={handleStepChange}
          enableMouseEvents
        >
          {images.map((step, index) => (
            <div key={step.label}>
              {Math.abs(activeStep - index) <= 2 ? (
                <Box
                  component="img"
                  sx={{
                    height: 600,
                    display: 'block',
                    overflow: 'hidden',
                    width: 1600,
                  }}
                  src={step.imgPath}
                  alt={step.label}
                />
              ) : null}
            </div>
          ))}
            </AutoPlaySwipeableViews>
            </div>
        </Box>
    );
}

export default SwipeableTextMobileStepper;