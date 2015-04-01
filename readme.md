## Ectoparasites Extract Tool

Um grande amigo me pediu que criasse uma ferramenta que o ajudasse a extrair e catalogar algumas informações de uma base de dados. Essa base de dados pertence a um Museu de Chicago/EUA, o qual não possui nenhuma API para automatizar o acesso as informações contidas em seu banco de dados de ectoparasitas. Sendo assim desenvolvi uma ferramente que simula um cliente web que faz acesso a determinadas URLs, preenche um [formulário](http://emuweb.fieldmuseum.org/arthropod/ectoparasites.php) e extrai as informações do resultado da busca, varrendo o DOM, capturando informações relevantes (IRNs) e por último acessa, extrai e cataloga as informações de URLs do tipo http://emuweb.fieldmuseum.org/arthropod/EPDisplay.php?irn=373255.

Essas informações são extraídas e exportadas em um arquivo .csv.
