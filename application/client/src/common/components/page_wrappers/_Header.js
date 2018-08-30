import React from 'react';
import styled from 'styled-components';
import { A, H3 } from 'UI';
import { home, blog } from 'Routes';
import { sizes } from 'Styles/media';

const StyledHeaderContent = styled.div`
  padding: 0 1em;
  max-width: ${sizes.extraLarge}px;
  width: 100%;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
`;

const Header = () => (
  <StyledHeaderContent>
    <div>
        <A href={home}><H3>ПриватБанк</H3></A>
    </div>
    <div>
      <A href={blog}><H3>Блог</H3></A>
    </div>
  </StyledHeaderContent>
);

export default Header;
